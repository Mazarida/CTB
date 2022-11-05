<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//$arSections = array();
//$arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'GLOBAL_ACTIVE' => 'Y');
//$db_list = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, array());
//while($ar_result = $db_list->GetNext()) {
//    $arSections[$ar_result['ID']] = $ar_result['NAME'];
//}
//
////PR($arSections);
////PR($arResult);
//
//foreach ($arSections as $id => $sect) {
//    foreach ($arResult["ITEMS"] as $key => $item) {
//        if ($id == $item['IBLOCK_SECTION_ID']) {
//            //$arResult["ITEMS"][$key]['IBLOCK_SECTION_NAME'] = $sect;
//            $arResult['_ITEMS'][$id][] = $item;
//        }
//    }
//}
//
//$arResult['_SECTIONS'] = $arSections;
//
////PR($arResult['_ITEMS']);


$arIds = array();
foreach ($arResult["ITEMS"] as $key => $item) {
    $arIds[] = $item['IBLOCK_SECTION_ID'];
}

$arIds = array_unique($arIds);

$arSections = array();
if (!empty($arIds)) {
    $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'GLOBAL_ACTIVE' => 'Y', 'ID' => $arIds);
    $db_list = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, array());
    while ($ar_result = $db_list->GetNext()) {
        $arSections[$ar_result['ID']] = array(
            'ID' => $ar_result['ID'],
            'NAME' => $ar_result['NAME'],
            'SORT' => $ar_result['SORT'],
            'DESCRIPTION' => $ar_result['~DESCRIPTION'],
        );
    }

    if (!empty($arSections)) {
        $arItems = array();
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
        //$arSelect = Array();
        $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $arIds);
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
}

//PR($arSections);
//PR($arResult['_SECTIONS']);
