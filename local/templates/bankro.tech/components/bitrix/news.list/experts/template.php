<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
?>

<div class="bn-experts__main">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="bn-experts__box wow fadeInUpShort" data-wow-duration="1s">
            <?if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="bn-experts__image">
            <?endif;?>

            <div class="bn-experts__group">
                <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                    <span class="bn-experts__name"><?=$arItem["NAME"]?></span>
                <?endif;?>

                <?if ($arItem["DETAIL_TEXT"]):?>
                    <span class="bn-experts__text"><?=mb_strimwidth($arItem["DETAIL_TEXT"], 0, 299, "...")?></span>
                    <button type="button" class="bn-btn-text bn-btn-text--green btn--expert" value="<?=$arItem['ID']?>"><?=Loc::getMessage('MORE_TEXT')?></button>
                <?endif;?>
            </div>

            <?if ($arItem['DISPLAY_PROPERTIES']['STATUS']['DISPLAY_VALUE']):?>
                <div class="bn-modal-circle">
                    <?=$arItem['DISPLAY_PROPERTIES']['STATUS']['DISPLAY_VALUE']?>
                </div>
            <?endif;?>
        </div>
    <?endforeach;?>
</div>

<?//PR($arResult);?>
