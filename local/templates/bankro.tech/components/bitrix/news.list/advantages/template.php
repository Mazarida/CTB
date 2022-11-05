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

$this->setFrameMode(true);
$time = 0.25;
?>

<div class="bn-benefits__grid">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="bn-benefits__box wow fadeInUpShort" data-wow-duration="1s" data-wow-delay="<?=($key + 1) * $time?>s">
            <?/*if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="bn-benefits__icon">
            <?endif;*/?>

            <?if ($arItem['DISPLAY_PROPERTIES']['SVG_PICTURE']['FILE_VALUE']['SRC']):?>
                <img src="<?=$arItem['DISPLAY_PROPERTIES']['SVG_PICTURE']['FILE_VALUE']['SRC']?>" alt="<?=$arItem["NAME"]?>" class="bn-benefits__icon">
            <?endif;?>

            <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                <span class="bn-benefits__title"><?=$arItem["NAME"]?></span>
            <?endif;?>

            <?if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
                <span class="bn-benefits__text"><?=$arItem["PREVIEW_TEXT"]?></span>
            <?endif;?>
        </div>
    <?endforeach;?>
</div>

<?//PR($arResult);?>
