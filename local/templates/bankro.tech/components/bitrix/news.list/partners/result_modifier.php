<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (count($arResult['ITEMS'])) {
    $arResult['ITEMS_CHUNKS'] = array_chunk($arResult['ITEMS'], 4);
}