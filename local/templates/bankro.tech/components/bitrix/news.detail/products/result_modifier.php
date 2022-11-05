<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ($arResult["PROPERTIES"]['HOW_WORK']['VALUE'] && is_array($arResult["PROPERTIES"]['HOW_WORK']['VALUE'])) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID" => array(IBLOCK_ID__HOW_WORK), "ID" => $arResult["PROPERTIES"]['HOW_WORK']['VALUE'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        if ($arFields['PREVIEW_PICTURE']) {
            $arResult['HOW_WORK'][] = array(
                'ID' => $arFields['ID'],
                'NAME' => $arFields['NAME'],
                'PREVIEW_PICTURE' => $arFields['PREVIEW_PICTURE'],
                'PREVIEW_PICTURE_SRC' => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
                'PREVIEW_TEXT' => $arFields["PREVIEW_TEXT_TYPE"] == 'text' ? $arFields["PREVIEW_TEXT"] : htmlspecialcharsBack($arFields["PREVIEW_TEXT"]),
            );
        }

        //PR($arFields);
    }
}

if ($arResult["PROPERTIES"]['ADDITIONAL_LINK_TEXT']['VALUE']) {
    $arResult["ADDITIONAL_LINK"] = [
        "TEXT" => $arResult["PROPERTIES"]['ADDITIONAL_LINK_TEXT']['VALUE'],
        "URL" => $arResult["PROPERTIES"]['ADDITIONAL_LINK_URL']['VALUE'],
    ];
} else {
    $arResult["ADDITIONAL_LINK"] = false;
}

if ($arResult["PROPERTIES"]['ADDITIONAL_LINK2_TEXT']['VALUE']) {
    $arResult["ADDITIONAL_LINK2"] = [
        "TEXT" => $arResult["PROPERTIES"]['ADDITIONAL_LINK2_TEXT']['VALUE'],
        "URL" => $arResult["PROPERTIES"]['ADDITIONAL_LINK2_URL']['VALUE'],
    ];
} else {
    $arResult["ADDITIONAL_LINK"] = false;
}

if ($arResult["PROPERTIES"]['DIRECTIONS']['VALUE'] && is_array($arResult["PROPERTIES"]['DIRECTIONS']['VALUE'])) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "PROPERTY_SVG_PREVIEW_PICTURE");
    $arFilter = Array("IBLOCK_ID" => array(IBLOCK_ID__DIRECTIONS), "ID" => $arResult["PROPERTIES"]['DIRECTIONS']['VALUE'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();

        //PR($arProps);

        if ($arProps['SVG_PREVIEW_PICTURE']['VALUE']) {
            $arResult['DIRECTIONS'][] = array(
                'ID' => $arFields['ID'],
                'NAME' => $arFields['NAME'],
//                'PREVIEW_PICTURE' => $arFields['PREVIEW_PICTURE'],
//                'PREVIEW_PICTURE_SRC' => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
                'PREVIEW_PICTURE' => $arProps['SVG_PREVIEW_PICTURE']['VALUE'],
                'PREVIEW_PICTURE_SRC' => CFile::GetPath($arProps['SVG_PREVIEW_PICTURE']['VALUE']),
                'URL' => $arFields["DETAIL_PAGE_URL"],
            );
        }

        //PR($arFields);
    }
}

if (is_array($arResult["PROPERTIES"]['KNOWLEDGE_BASE']['VALUE']) && !empty($arResult["PROPERTIES"]['KNOWLEDGE_BASE']['VALUE'])) {
    $arSections = array();
    $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'GLOBAL_ACTIVE' => 'Y', 'ID' => $arResult["PROPERTIES"]['KNOWLEDGE_BASE']['VALUE']);
    $db_list = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, array());
    while ($ar_result = $db_list->GetNext()) {
        $arSections[$ar_result['ID']] = array(
            'ID' => $ar_result['ID'],
            'NAME' => $ar_result['NAME'],
            'SORT' => $ar_result['SORT'],
            'DESCRIPTION' => $ar_result['~DESCRIPTION'],
        );
        //$arSections[] = $ar_result;
    }

    if (!empty($arSections)) {
        $arItems = array();
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
        //$arSelect = Array();
        $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $arResult["PROPERTIES"]['KNOWLEDGE_BASE']['VALUE']);
        $db_list = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
        $number = 0;
        while ($ar_result = $db_list->GetNext()) {
            $arItems[$ar_result['IBLOCK_SECTION_ID']][] = array(
                'ID' => $ar_result['IBLOCK_SECTION_ID'],
                'NAME' => $arSections[$ar_result['IBLOCK_SECTION_ID']]['NAME'],
                'SORT' => $arSections[$ar_result['IBLOCK_SECTION_ID']]['SORT'],
                'DESCRIPTION' => $arSections[$ar_result['IBLOCK_SECTION_ID']]['DESCRIPTION'],
                'PREVIEW_PICTURE' => CFile::GetPath($ar_result['PREVIEW_PICTURE']),
                'DETAIL_PAGE_URL' => $ar_result['DETAIL_PAGE_URL'],
            );
        }

        foreach ($arSections as $id => $item) {
            $arResult['_SECTIONS'][$item['ID']] = array(
                'ID' => $item['ID'],
                'NAME' => $item['NAME'],
                'SORT' => $item['SORT'],
                'DESCRIPTION' => $item['DESCRIPTION'],
                'ITEMS' => $arItems[$id]
            );
        }

    }

//    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
//    $arFilter = Array("IBLOCK_ID" => array(IBLOCK_ID__KNOWLEDGE_BASE), "ID" => $arResult["PROPERTIES"]['KNOWLEDGE_BASE']['VALUE'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
//    $res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
//
//    while ($ob = $res->GetNextElement()) {
//        $arFields = $ob->GetFields();
//
//        if ($arFields['PREVIEW_PICTURE']) {
//            $arResult['KNOWLEDGE_BASE'][] = array(
//                'ID' => $arFields['ID'],
//                'NAME' => $arFields['NAME'],
//                'PREVIEW_PICTURE' => $arFields['PREVIEW_PICTURE'],
//                'PREVIEW_PICTURE_SRC' => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
//                'URL' => $arFields["DETAIL_PAGE_URL"],
//            );
//        }
//
//        //PR($arFields);
//    }
}
