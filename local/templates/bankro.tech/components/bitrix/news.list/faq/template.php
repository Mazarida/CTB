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
?>

<div class="bn-accordion">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="bn-accordion__block wow fadeInUpShort" data-wow-duration="1s">
            <div class="bn-accordion__top<?if ($key == 0) echo ' active';?>">
                <?if($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                    <span class="bn-accordion__main-title"><?=$arItem["NAME"]?></span>
                <?endif;?>

                <div class="bn-plus-circle<?if ($key == 0) echo ' active';?>">
                    <span class="bn-plus-circle__line"></span>
                    <span class="bn-plus-circle__line"></span>
                </div>
            </div>

            <div class="bn-accordion__show"<?if ($key == 0) echo ' style="display: block;"';?>>
                <?if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
                    <p class="bn-accordion__text"><?=$arItem["PREVIEW_TEXT"]?></p>
                <?endif;?>
            </div>
        </div>
    <?endforeach;?>
</div>
