<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$expert_id = 0 < intval($_REQUEST['expert_id']) ? intval($_REQUEST['expert_id']) : 0;

if ($expert_id && \Bitrix\Main\Loader::includeModule('iblock')) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_STATUS", "PROPERTY_POSITION");
    $arFilter = Array("IBLOCK_ID" => IBLOCK_ID__EXPERTS, "ID" => $expert_id);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

    if ($item = $res->GetNext()) {
        //PR($item);?>
        <div class="bn-modal-experts__header">
            <img src="<?=CFile::GetPath($item['PREVIEW_PICTURE'])?>" alt="avatar" class="bn-modal-experts__avatar">

            <div class="bn-modal-experts__group">
                <span class="bn-modal-experts__name"><?=$item['NAME']?></span>
                <span class="bn-modal-experts__position"><?=$item['PROPERTY_POSITION_VALUE']?></span>
            </div>
        </div>

        <div class="bn-quote">
            <span class="bn-quote__text"><?=$item['PREVIEW_TEXT']?></span>
        </div>

        <span class="bn-modal-experts__text"><?=$item['DETAIL_TEXT']?></span>

        <div class="bn-modal-circle">
            <?=htmlspecialcharsBack($item['PROPERTY_STATUS_VALUE']['TEXT'])?>
        </div>

        <button type="button" class="bn-btn-close" onclick="$('.bn-overlay').fadeOut(100);$('.bn-modal').fadeOut(100);window.scroll_hidden();">
            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/close.svg'?>" alt="close icon" class="bn-btn-close__close">
        </button>
    <?}
}