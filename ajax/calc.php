<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($_REQUEST['to_pdf'] == 2) {
    //PR($_REQUEST, false, true);
    $errors = '';
    if (empty($_REQUEST['bank'])) {
        $errors .= '<p>Укажите Банк получателя.</p>';
    }

    if (empty($_REQUEST['bik'])) {
        $errors .= '<p>Укажите БИК.</p>';
    }

    if (empty($_REQUEST['kpp'])) {
        $errors .= '<p>Укажите КПП.</p>';
    }

    if (empty($_REQUEST['inn'])) {
        $errors .= '<p>Укажите ИНН.</p>';
    }

    if (empty($_REQUEST['account_number'])) {
        $errors .= '<p>Укажите Номер счета.</p>';
    }

    if (empty($_REQUEST['company_name'])) {
        $errors .= '<p>Укажите Название компании.</p>';
    }

    if (empty($_REQUEST['agreement'])) {
        $errors .= '<p>Установите флажок согласия на обработку персональных данных.</p>';
    }

    if (!empty($errors)) {
        echo json_encode(
            array(
                'status' => 'error',
                'error_msg' => $errors,
            )
        );

        die();
    }
}

$calc_products_min_total = \Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_PRODUCTS_MIN_TOTAL");
$calc_nds_percent = \Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_NDS_PERCENT");
$total = 0;
$nds = 0;
$count = 0;
$result = array(
    'automation' => array(
        'org' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
        'ind' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
    ),
    'monitoring' => array(
        //'price_per_one' => number_format(array_reverse(CALC_MONITORING_TARIFFS)[0]['PRICE'], 2, ',', ' ').' р.',
        'price_per_one' => '0,00 р.',
        'price' => 0,
    ),
    'meetings' => array(
        'org' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
        'ind' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
    ),
    'api' => array(
        'org' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
        'ind' => array(
            'price_quarter' => '0,00 р.',
            'price_year' => '0,00 р.',
            'price' => 0,
        ),
    ),
);

$arTariffs = array();
if (CModule::IncludeModule("iblock")) {
    $arSect = array();
    $arFilter = Array("IBLOCK_ID" => IBLOCK_ID__CALC_SETTINGS, "GLOBAL_ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "UF_*");
    $rsSect = CIBlockSection::GetList(Array("SORT" => "ASC", "ID" => "ASC"), $arFilter, false, $arSelect);
    while ($ar_sect = $rsSect->GetNext()) {
        $arSect[$ar_sect['ID']] = $ar_sect;
    }

    $arFilter = Array("IBLOCK_ID" => IBLOCK_ID__CALC_SETTINGS, "ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "NAME", "CODE", "PROPERTY_MAX", "PROPERTY_TOTAL", "PROPERTY_PRICE");
    $rsElem = CIBlockElement::GetList(Array("SORT" => "DESC", "ID" => "ASC"), $arFilter, false, false, $arSelect);
    while ($ar_elem = $rsElem->GetNext()) {
        $arSect[$ar_elem['IBLOCK_SECTION_ID']]['TARIFFS'][] = $ar_elem;
    }

    foreach ($arSect as $item) {
        $arTariffs[$item['CODE']] = $item;
    }
    //PR($arTariffs);
}

// Автоматизация
if (isset($_REQUEST['automation']['product']) && $_REQUEST['automation']['product'] == 'Y') {
    if (isset($_REQUEST['automation']['org']) && $_REQUEST['automation']['org'] == 'Y') {
        if ($_REQUEST['automation']['org_count'] >= $arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['TARIFFS'] as $item) {
                if ($_REQUEST['automation']['org_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['automation']['org_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['automation']['org']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['automation']['org']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['automation']['org']['price'] = $price;
                    $result['automation']['org']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
    if (isset($_REQUEST['automation']['ind']) && $_REQUEST['automation']['ind'] == 'Y') {
        if ($_REQUEST['automation']['ind_count'] >= $arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_AUTOMATION_TARIFFS_IND']['TARIFFS'] as $item) {
                if ($_REQUEST['automation']['ind_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['automation']['ind_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['automation']['ind']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['automation']['ind']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['automation']['ind']['price'] = $price;
                    $result['automation']['ind']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
}

if ($result['automation']['org']['price'] + $result['automation']['ind']['price'] > 0) {
    $count++;
    $total += $result['automation']['org']['price'] + $result['automation']['ind']['price'];
    $nds += $result['automation']['org']['nds'] + $result['automation']['ind']['nds'];
}

// Мониторинг
if (isset($_REQUEST['monitoring']['product']) && $_REQUEST['monitoring']['product'] == 'Y') {
    if ($_REQUEST['monitoring']['count'] >= $arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN']) {
        foreach ($arTariffs['CALC_MONITORING_TARIFFS']['TARIFFS'] as $item) {
            if ($_REQUEST['monitoring']['count'] >= $item['PROPERTY_MAX_VALUE']) {
                $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['monitoring']['count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                $result['monitoring']['price'] = $price;
                //$result['monitoring']['price_per_one'] = number_format($item['PRICE'], 2, ',', ' ').' р.';
                $price_per_one = $_REQUEST['monitoring']['count'] > 0 ? $price / $_REQUEST['monitoring']['count'] : 0;
                $result['monitoring']['price_per_one'] = number_format($price_per_one, 2, ',', ' ').' р.';
                $result['monitoring']['nds'] = $price / 100 * $calc_nds_percent;
                break;
            }
        }
    }
}

if ($result['monitoring']['price'] > 0) {
    $count++;
    $total += $result['monitoring']['price'];
    $nds += $result['monitoring']['nds'];
}

// Собрания
if (isset($_REQUEST['meetings']['product']) && $_REQUEST['meetings']['product'] == 'Y') {
    if (isset($_REQUEST['meetings']['org']) && $_REQUEST['meetings']['org'] == 'Y') {
        if ($_REQUEST['meetings']['org_count'] >= $arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_MEETINGS_TARIFFS_ORG']['TARIFFS'] as $item) {
                if ($_REQUEST['meetings']['org_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['meetings']['org_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['meetings']['org']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['meetings']['org']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['meetings']['org']['price'] = $price;
                    $result['meetings']['org']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
    if (isset($_REQUEST['meetings']['ind']) && $_REQUEST['meetings']['ind'] == 'Y') {
        if ($_REQUEST['meetings']['ind_count'] >= $arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_MEETINGS_TARIFFS_IND']['TARIFFS'] as $item) {
                if ($_REQUEST['meetings']['ind_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['meetings']['ind_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['meetings']['ind']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['meetings']['ind']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['meetings']['ind']['price'] = $price;
                    $result['meetings']['ind']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
}

if ($result['meetings']['org']['price'] + $result['meetings']['ind']['price'] > 0) {
    $count++;
    $total += $result['meetings']['org']['price'] + $result['meetings']['ind']['price'];
    $nds += $result['meetings']['org']['nds'] + $result['meetings']['ind']['nds'];
}

// API
if (isset($_REQUEST['api']['product']) && $_REQUEST['api']['product'] == 'Y') {
    if (isset($_REQUEST['api']['org']) && $_REQUEST['api']['org'] == 'Y') {
        if ($_REQUEST['api']['org_count'] >= $arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_API_TARIFFS_ORG']['TARIFFS'] as $item) {
                if ($_REQUEST['api']['org_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['api']['org_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['api']['org']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['api']['org']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['api']['org']['price'] = $price;
                    $result['api']['org']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
    if (isset($_REQUEST['api']['ind']) && $_REQUEST['api']['ind'] == 'Y') {
        if ($_REQUEST['api']['ind_count'] >= $arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN']) {
            foreach ($arTariffs['CALC_API_TARIFFS_IND']['TARIFFS'] as $item) {
                if ($_REQUEST['api']['ind_count'] >= $item['PROPERTY_MAX_VALUE']) {
                    $price = $item['PROPERTY_TOTAL_VALUE'] + (($_REQUEST['api']['ind_count'] - $item['PROPERTY_MAX_VALUE']) * $item['PROPERTY_PRICE_VALUE']);
                    $result['api']['ind']['price_quarter'] = number_format($price / 4, 2, ',', ' ') . ' р.';
                    $result['api']['ind']['price_year'] = number_format($price, 2, ',', ' ') . ' р.';
                    $result['api']['ind']['price'] = $price;
                    $result['api']['ind']['nds'] = $price / 100 * $calc_nds_percent;
                    break;
                }
            }
        }
    }
}

if ($result['api']['org']['price'] + $result['api']['ind']['price'] > 0) {
    $count++;
    $total += $result['api']['org']['price'] + $result['api']['ind']['price'];
    $nds += $result['api']['org']['nds'] + $result['api']['ind']['nds'];
}

$result['count_text'] = $count.' продукт'.BITGetDeclNum($count);
$result['total_text'] = number_format($total, 2, ',', ' ').' р.';
$result['count'] = $count;
$result['total'] = $total;
if ($total < $calc_products_min_total) {
    $result['show_consult_btn'] = 1;
} else {
    $result['show_consult_btn'] = 0;
}

if (isset($_REQUEST['to_pdf']) && $_REQUEST['to_pdf'] == 1) {
    require_once('../lib/tcpdf/tcpdf.php');

    $number = 1;
    $html =
        '<html lang=ru><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><body>
        <style type="text/css">
            * {box-sizing: border-box; margin: 0; padding: 0;}
            h1 {text-align: center;}
        </style>
        <body>'.
        '<h1>Расчет стоимости продуктов Bankro.TECH</h1>'.
        '<table cellspacing="0" cellpadding="1" border="1">'.
        '<tr><th align="center" width="30">№</th><th align="center" width="270">Наименование</th><th align="center" width="80">Кол-во ИНН</th><th align="center" width="80">Срок доступа, мес.</th><th align="center" width="80">Сумма, руб. (с НДС)</th></tr>';

    if ($result['automation']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Автоматизация процедур банкротства (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['automation']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['automation']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['automation']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Автоматизация процедур банкротства (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['automation']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['automation']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['monitoring']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Мониторинг</td>'.
            '<td align="center">'.$_REQUEST['monitoring']['count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['monitoring']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['meetings']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Электронные собрания кредиторов (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['meetings']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['meetings']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['meetings']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Электронные собрания кредиторов (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['meetings']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['meetings']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['api']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />API (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['api']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['api']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['api']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />API (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['api']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['api']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    $html .= '</table>';
    if ($total > 0) {
        $html .= '<div style="text-align: right">';
        $html .= '<p>Кол-во продуктов: '.$count.'</p>';
        $html .= '<p>Всего к оплате: '.number_format($total, 2, ',', ' ').' руб.</p>';
        $html .= '</div>';
    }
    $html .= '</body></html>';

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    // Устанавливаем информацию о документе
    $pdf->SetAuthor('Имя автора');
    $pdf->SetTitle('Название документа');

    // Устанавливаем моноширинный шрифт по умолчанию
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Устанавливаем отступы
    $pdf->SetMargins(10, 10, 10, 10);

    // выключаем шапку и футер
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Устанавливаем автоматические разрывы страниц
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Устанавливаем шрифт
    $pdf->SetFont('dejavusans', '', 12, '', true);

    // Добавляем страницу
    $pdf->AddPage();

    // Выводим текст с помощью writeHTMLCell()
    $pdf->writeHTML($html, true, 0, true, 0);

    // Закрываем и выводим PDF документ
    $file_name = '/ajax/calc_'.$_REQUEST['date'].'.pdf';
    $output = $pdf->Output($_SERVER['DOCUMENT_ROOT'] . $file_name, 'F');

    //file_put_contents(dirname(__FILE__) . '/calculation.pdf', $output);
    echo $file_name;
} elseif (isset($_REQUEST['to_pdf']) && $_REQUEST['to_pdf'] == 2) {
    require_once('../lib/tcpdf/tcpdf.php');

    $number = 1;
    $html =
        '<html lang=ru><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><body>
        <style type="text/css">
            * {box-sizing: border-box; margin: 0; padding: 0;}
            h1 {text-align: center;}
        </style>
        <body>'.
        '<table cellspacing="0" cellpadding="1" border="1" style="font-size: 10px;">'.
        '<tr><td rowspan="2" colspan="2" width="290">'.PDF_INVOICE_BANK.'<br /><br /><span style="font-size:8px;">Банк получателя</span></td>'.
        '<td width="60">БИК</td>'.
        '<td rowspan="2" width="180">'.PDF_INVOICE_BIK.'<br /><br />'.PDF_INVOICE_ACCOUNT_1.'</td></tr>'.
        '<tr><td>Сч. №</td></tr>'.
        '<tr><td width="145">ИНН '.PDF_INVOICE_INN.'</td>'.
        '<td width="145">КПП '.PDF_INVOICE_KPP.'</td>'.
        '<td rowspan="2">Сч. №</td>'.
        '<td rowspan="2">'.PDF_INVOICE_ACCOUNT_2.'</td></tr>'.
        '<tr><td colspan="2">'.PDF_INVOICE_COMPANY.'<br /><br /><span style="font-size:8px;">Получатель</span></td></tr>'.
        '</table>'.
        '<h3 style="text-align: center;">Счет-оферта</h3>'.
        '<h5 style="text-align: center;">№ _________ от '.date("d.m.Y").' г.</h5>'.
        '<hr />'.
        '<div style="font-size: 9px;text-align: justify;">'.
        '<p>1. Настоящий счет-оферта (далее – Счет) является письменным предложением (офертой) Правообладателя заключить Договор на предоставление удаленного доступа к программе для ЭВМ (далее – Договор). Договор заключается путем принятия (акцепта) оферты Пользователем в соответствии с п.1 ст.433 и п.3 ст. 438 ГК РФ, что считается соблюдением письменной формы договора (п. 3. ст. 434 ГК РФ). Акцепт настоящей оферты осуществляется путем оплаты настоящего Счета (п.3 ст.438 ГК РФ).</p>'.
        '<p>2. Предметом Договора является предоставление Правообладателем Пользователю удаленного доступа к программе для ЭВМ Bankro.TECH на условиях предоставления неисключительной лицензии, не включающей передачу третьим лицам, посредством информационно-телекоммуникационной сети «Интернет». Заключение настоящего Договора не влечет за собой переход исключительных прав на программу для ЭВМ от Правообладателя к Пользователю.</p>'.
        '<p>3. Программа для ЭВМ Bankro.TECH зарегистрирована в реестре программ для ЭВМ Федеральной службой по интеллектуальной собственности 03.04.2018г., Свидетельство № 2018614184.</p>'.
        '<p>4. Пользователь обязуется не нарушать интеллектуальное права Правообладателя, а в случае нарушения - нести предусмотренную законодательством ответственность.</p>'.
        '<p>5. Территория использования программы для ЭВМ – территория всего мира, если это не противоречит законодательству страны, в которой осуществляется использование программы для ЭВМ.</p>'.
        '<p>6. Под доступом к программе для ЭВМ понимается возможность использования Пользователем программы для ЭВМ следующими способами:<br />- просмотр функциональных возможностей программы для ЭВМ и ее контента;<br />- использование функциональных возможностей программы для ЭВМ и ее контента в соответствии с назначением программы для ЭВМ.</p>'.
        '<p>7. Доступ к программе для ЭВМ предоставляется Пользователю в течение 5 (пяти) рабочих дней со дня получения оплаты по настоящему Счету, путем создания Правообладателем уникального идентификатора Пользователя.</p>'.
        '<p>8. Уникальный идентификатор Пользователя, информация о регистрации в программе для ЭВМ, а также руководство Пользователя предоставляются на электронный адрес, указанный Пользователем.</p>'.
        '<p>9. Использование программы для ЭВМ доступно Пользователю после совершения процедуры регистрации на сайте программы для ЭВМ https://(уникальный идентификатор пользователя).bankro.tech</p>'.
        '<p>10. Срок, на который Пользователю предоставляется доступ к программе для ЭВМ, контент, доступный Пользователю и сумма вознаграждения Правообладателя указаны в настоящем Счете.</p>'.
        '<p>11. Сдача-приемка услуг осуществляется Сторонами каждый отчетный период, который составляет 3 (Три) месяца и исчисляется с даты предоставления доступа к программе для ЭВМ.</p>'.
        '<p>12. Любые споры, которые могут возникнуть между Правообладателем и Пользователем в связи с настоящим договором, подлежат рассмотрению по месту нахождения истца.</p>'.
        '<div style="font-size: 9px;font-weight: bold;text-align: justify;">'.
        '<p>Правообладатель:<br />'.PDF_INVOICE_REQUISITES_STRING.'</p>'.
        '<p>Пользователь:</p>'.
        '</div></div>'.
        '<table cellspacing="0" cellpadding="1" border="1" style="font-size: 10px;">'.
        '<tr><th align="center" width="30">№</th>'.
        '<th align="center" width="230">Наименование</th>'.
        '<th align="center" width="70">Кол-во банкротных дел/ИНН</th>'.
        '<th align="center" width="70">Срок доступа, мес.</th>'.
        '<th align="center" width="70">Цена, руб.</th>'.
        '<th align="center" width="70">Сумма, руб. (с НДС)</th></tr>';

    if ($result['automation']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Автоматизация процедур банкротства (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['automation']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['automation']['org']['price'] - $result['automation']['org']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['automation']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['automation']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Автоматизация процедур банкротства (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['automation']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['automation']['ind']['price'] - $result['automation']['ind']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['automation']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['monitoring']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Мониторинг</td>'.
            '<td align="center">'.$_REQUEST['monitoring']['count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['monitoring']['price'] - $result['monitoring']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['monitoring']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['meetings']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Электронные собрания кредиторов (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['meetings']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['meetings']['org']['price'] - $result['meetings']['org']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['meetings']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['meetings']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />Электронные собрания кредиторов (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['meetings']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['meetings']['ind']['price'] - $result['meetings']['ind']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['meetings']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['api']['org']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />API (Банкротство организаций)</td>'.
            '<td align="center">'.$_REQUEST['api']['org_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['api']['org']['price'] - $result['api']['org']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['api']['org']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    if ($result['api']['ind']['price'] > 0) {
        $html .= '<tr><td align="center">'.$number.'</td>'.
            '<td>Доступ к программе для ЭВМ Bankro.TECH<br />API (Банкротство граждан)</td>'.
            '<td align="center">'.$_REQUEST['api']['ind_count'].'</td>'.
            '<td align="center">12</td>'.
            '<td align="center">'.number_format($result['api']['ind']['price'] - $result['api']['ind']['nds'], 2, ',', ' ').'</td>'.
            '<td align="center">'.number_format($result['api']['ind']['price'], 2, ',', ' ').'</td></tr>';
        $number++;
    }
    $html .= '</table>';
    if ($total > 0) {
        $html .= '<div style="text-align: right;font-weight: bold;font-size: 10px;">';
        $html .= '<p>Итого: '.number_format($total, 2, ',', ' ').'</p>';
        $html .= '<p>В том числе НДС: '.number_format($nds, 2, ',', ' ').'</p>';
        $html .= '<p>Всего к оплате: '.number_format($total, 2, ',', ' ').'</p>';
        $html .= '</div>';
        $html .= '<div style="font-size: 10px;line-height: 7px;">';
        $html .= '<p>Всего наименований '.($number - 1).', на сумму '.number_format($total, 2, ',', ' ').' руб.</p>';
        $html .= '<p style="font-weight: bold;">'.GetNumber2Word_Rus($total).'</p>';
        $html .= '</div>';
        $html .= '<hr/>';
        $html .= '<p></p>';
        $html .= '<p></p>';
        $html .= '<p></p>';
        $html .= '<table style="font-size: 10px;">'.
            '<tr><td width="270"><span style="font-weight: bold;">Руководитель</span> _____________________ '.PDF_INVOICE_DIRECTOR.'</td>'.
            '<td rowspan="2" width="270" style="text-align: right;"><span style="font-weight: bold;">Бухгалтер</span> _____________________ '.PDF_INVOICE_ACCOUNTANT.'</td></tr>'.
            '<tr><td><span style="font-size: 8px;text-align: center;">'.PDF_INVOICE_DIRECTOR_TEXT.'</span></td></tr>'.
            '</table>';
    }
    $html .= '</body></html>';

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    // Устанавливаем информацию о документе
    $pdf->SetAuthor('Имя автора');
    $pdf->SetTitle('Название документа');

    // Устанавливаем моноширинный шрифт по умолчанию
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Устанавливаем отступы
    $pdf->SetMargins(10, 10, 10, 10);

    // выключаем шапку и футер
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Устанавливаем автоматические разрывы страниц
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Устанавливаем шрифт
    $pdf->SetFont('dejavusans', '', 12, '', true);

    // Добавляем страницу
    $pdf->AddPage();

    // Выводим текст с помощью writeHTMLCell()
    $pdf->writeHTML($html, true, 0, true, 0);

    // Закрываем и выводим PDF документ
    $file_name = '/ajax/invoice_'.$_REQUEST['date'].'.pdf';
    $output = $pdf->Output($_SERVER['DOCUMENT_ROOT'] . $file_name, 'F');

    //file_put_contents(dirname(__FILE__) . '/calculation.pdf', $output);
    //echo $file_name;
    echo json_encode(
        array(
            'status' => 'success',
            'filename' => $file_name,
        )
    );
} else {
    echo json_encode($result);
}

die();