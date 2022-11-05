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

$current_time = '';
?>

<div class="swiper-wrapper">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <?if ($arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE']):?>
            <?if ($key > 0 && $current_time != $arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE']):?>
                        </div>
                    </div>
                </div>
            <?endif;?>
            <?if ($current_time != $arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE']):?>
                <div class="swiper-slide slider-dev-plan__block">
                    <h2 class="bn-h2"><?=$arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE']?></h2>
                    <span class="slider-dev-plan__line"></span>
                    <div class="swiper slider-dev-plan__group slider-dev-plan--box">
                        <div class="swiper-wrapper">
            <?endif;?>
        <?endif;?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="swiper-slide slider-dev-plan__box">
            <?if (!empty($arItem['TAGS'])):?>
                <?
                $arTags = explode(', ', $arItem["TAGS"]);
                foreach ($arTags as $tag) {
                    if (!in_array($tag, $tags)) {
                        $tags[] = $tag;
                    }
                }

                if (!empty($tags)) {
                    asort($tags);
                    foreach ($tags as $tag) {
                        echo '<span class="slider-dev-plan__hashtag">#' . mb_ucfirst($tag) . '</span>';
                    }
                }

                unset($tags);
                ?>
            <?endif;?>

            <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                <span class="slider-dev-plan__title"><?=$arItem["NAME"]?></span>
            <?endif;?>

            <?if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
                <div class="slider-dev-plan__description">
                    <span class="slider-dev-plan__description-text"><?=$arItem["PREVIEW_TEXT"]?></span>
                </div>
            <?endif;?>

            <div class="bn-rocket">
                <div class="bn-rocket__group">
                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/rocket.svg'?>" alt="rocket icon" class="bn-rocket__icon">
                    <span class="bn-rocket__line"></span>
                </div>
            </div>
        </div>

        <?$current_time = $arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE'] ? $arItem['DISPLAY_PROPERTIES']['TIME_LABEL']['DISPLAY_VALUE'] : '';?>
    <?endforeach;?>
            </div>
        </div>
    </div>
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
