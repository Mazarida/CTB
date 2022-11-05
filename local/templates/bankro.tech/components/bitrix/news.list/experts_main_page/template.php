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

<div class="swiper-wrapper">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="swiper-slide expert-slider__box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                <span class="expert-slider__name"><?=$arItem["NAME"]?></span>
            <?endif;?>

            <?if ($arItem['DISPLAY_PROPERTIES']['POSITION']['DISPLAY_VALUE']):?>
                <span class="expert-slider__position"><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['DISPLAY_VALUE']?></span>
            <?endif;?>

            <?if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <div class="expert-slider__btn btn--expert" data-expert_id="<?=$arItem['ID']?>">
                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/info--green.svg'?>" alt="info icon">
                </div>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="expert-slider__img">
            <?endif;?>
        </div>
    <?endforeach;?>
</div>

<div class="swiper-button-prev">
    <svg width="19" height="16" viewBox="0 0 19 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976314 8.31658 0.292893 8.70711L6.65686 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538409 7.04738 0.538409 6.65685 0.928933L0.292892 7.29289ZM19 7L1 7L1 9L19 9L19 7Z"/>
    </svg>
</div>
<div class="swiper-button-next">
    <svg width="19" height="16" viewBox="0 0 19 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.7071 7.29289C19.0976 7.68342 19.0976 8.31658 18.7071 8.70711L12.3431 15.0711C11.9526 15.4616 11.3195 15.4616 10.9289 15.0711C10.5384 14.6805 10.5384 14.0474 10.9289 13.6569L16.5858 8L10.9289 2.34315C10.5384 1.95262 10.5384 1.31946 10.9289 0.928933C11.3195 0.538409 11.9526 0.538409 12.3431 0.928933L18.7071 7.29289ZM8.74228e-08 7L18 7L18 9L-8.74228e-08 9L8.74228e-08 7Z" />
    </svg>
</div>

<?//PR($arResult);?>
