<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$section_id = $arResult['IBLOCK_SECTION_ID'];

if ($section_id) {
    $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'GLOBAL_ACTIVE' => 'Y', 'ID' => $section_id);
    $db_list = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, array());
    if ($ar_result = $db_list->GetNext()) {
        $arResult['_SECTION']['NAME'] = $ar_result['NAME'];
    }

//PR($arResult['_SECTION']);
//PR($arResult);

    $arItems = array();
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
    //$arSelect = Array();
    $arFilter = Array('IBLOCK_ID' => IBLOCK_ID__KNOWLEDGE_BASE, 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $section_id);
    $db_list = CIBlockElement::GetList(array('SORT' => 'ASC', 'ID' => 'ASC'), $arFilter, false, false, $arSelect);
    $number = 1;
    while ($ar_result = $db_list->GetNext()) {
        $arResult['_SECTION']['ITEMS'][] = array(
            'ID' => $ar_result['ID'],
            'CURRENT_ACTIVE' => $arResult['ID'] == $ar_result['ID'] ? 'Y' :'N',
            'NUMBER' => $number,
            'NAME' => $ar_result['NAME'],
            'PREVIEW_PICTURE_SRC' => CFile::GetPath($ar_result['PREVIEW_PICTURE']),
            'DETAIL_PAGE_URL' => $ar_result['DETAIL_PAGE_URL'],
        );
        $number++;
    }
}

//PR($arResult['_SECTION']);
