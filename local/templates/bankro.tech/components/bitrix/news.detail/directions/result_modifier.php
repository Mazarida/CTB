<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arProducts = array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "PROPERTY_SCREENCAST");
$arFilter = Array("IBLOCK_ID" => array(IBLOCK_ID__PRODUCTS), "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);

while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();

    $arProducts[$arFields['ID']] = array(
        'ID' => $arFields['ID'],
        'NAME' => $arFields['NAME'],
        'PREVIEW_PICTURE' => $arFields['PREVIEW_PICTURE'],
        'PREVIEW_PICTURE_SRC' => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
        'URL' => $arFields["DETAIL_PAGE_URL"],
    );

    $arProps = $ob->GetProperties();
    //PR($arProps);
    $video_link = '';
    if ($arProps['SCREENCAST']['VALUE']) {
        $link = $arProps['SCREENCAST']['VALUE'];

        $arr = explode('v=', $link);
        if (isset($arr[1])) {
            $video_link = 'https://www.youtube.com/embed/'.$arr[1].'?autoplay=1&mute=1&controls=0&loop=1&rel=0&showinfo=0&modestbranding=1&playlist='.$arr[1];
        } else {
            $arr = array_reverse(explode('/', $link));
            if ($arr[1] = 'embed' && $arr[0]) {
                $video_link = 'https://www.youtube.com/embed/'.$arr[0].'?autoplay=1&mute=1&controls=0&loop=1&rel=0&showinfo=0&modestbranding=1&playlist='.$arr[0];
            }
        }
    }
    $arProducts[$arFields['ID']]['SCREENCAST'] = $video_link;
}

//PR($arProducts);

$arProblems = $arResult['PROPERTIES']['DIRECTION_PROBLEMS']['VALUE'];

$arElems = array();
if ($arProblems && is_array($arProblems)) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "PROPERTY_PRODUCT", "PROPERTY_TASK_TITLE",
        "PROPERTY_TASK_DESC", "PROPERTY_SOLUTION_TITLE", "PROPERTY_SOLUTION_DESC", "PROPERTY_VALUE_DESC");
    $arFilter = Array("IBLOCK_ID" => array(IBLOCK_ID__DIRECTIONS_PROBLEMS), "ID" => $arProblems, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while ($elem = $res->GetNext()) {
        //PR($elem);
        $arElems[$elem['ID']] = $elem;
    }

    foreach ($arProblems as $item) {
        $arResult['PROBLEMS'][] = array(
            'ID' => $arElems[$item]['ID'],
            'NAME' => $arElems[$item]['NAME'],
            'PREVIEW_PICTURE' => $arElems[$item]['PREVIEW_PICTURE'],
            'PREVIEW_PICTURE_SRC' => CFile::GetPath($arElems[$item]["PREVIEW_PICTURE"]),
            'PRODUCT' => $arElems[$item]['PROPERTY_PRODUCT_VALUE'] ? $arProducts[$arElems[$item]['PROPERTY_PRODUCT_VALUE']] : array(),
            'TASK_TITLE' => $arElems[$item]['PROPERTY_TASK_TITLE_VALUE'],
            'TASK_DESC' => $arElems[$item]['PROPERTY_TASK_DESC_VALUE']['TYPE'] == 'HTML' ?
                htmlspecialcharsBack($arElems[$item]['PROPERTY_TASK_DESC_VALUE']['TEXT']) :
                (!empty($arElems[$item]['PROPERTY_TASK_DESC_VALUE']['TEXT']) ? '<p>'.$arElems[$item]['PROPERTY_TASK_DESC_VALUE']['TEXT'].'</p>' : ''),
            'SOLUTION_TITLE' => $arElems[$item]['PROPERTY_SOLUTION_TITLE_VALUE'],
            'SOLUTION_DESC' => $arElems[$item]['PROPERTY_SOLUTION_DESC_VALUE']['TYPE'] == 'HTML' ?
                htmlspecialcharsBack($arElems[$item]['PROPERTY_SOLUTION_DESC_VALUE']['TEXT']) :
                (!empty($arElems[$item]['PROPERTY_SOLUTION_DESC_VALUE']['TEXT']) ? '<p>'.$arElems[$item]['PROPERTY_SOLUTION_DESC_VALUE']['TEXT'].'</p>' : ''),
            'VALUE_DESC' => $arElems[$item]['PROPERTY_VALUE_DESC_VALUE']['TYPE'] == 'HTML' ?
                htmlspecialcharsBack($arElems[$item]['PROPERTY_VALUE_DESC_VALUE']['TEXT']) :
                (!empty($arElems[$item]['PROPERTY_VALUE_DESC_VALUE']['TEXT']) ? '<p>'.$arElems[$item]['PROPERTY_VALUE_DESC_VALUE']['TEXT'].'</p>' : ''),
        );
    }
}

//PR($arResult['PROBLEMS']);