<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

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

if (PRODUCT_ID__API == $arResult['ID']) {
    $prefix = 'api';
} elseif (PRODUCT_ID__ELECTRONIC_MEETINGS == $arResult['ID']) {
    $prefix = 'electronic';
} elseif (PRODUCT_ID__AUTOMATION == $arResult['ID']) {
    $prefix = 'automatic';
} elseif (PRODUCT_ID__MONITORING == $arResult['ID']) {
    $prefix = 'monitoring';
} else {
    $prefix = '';
}
?>

    <section class="bn-hero-product bn-hero-product-<?=$prefix?>">
        <div class="bn-wrapper">
            <div class="bn-hero-product__colum">
                <?if ($arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_TITLE']['DISPLAY_VALUE']):?>
                    <h1 class="bn-h1 wow fadeInLeftShort" data-wow-duration="1s"><?=$arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_TITLE']['~VALUE']?></h1>
                <?endif;?>

                <?if ($arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_DESC']['DISPLAY_VALUE']):?>
                    <span class="bn-hero-product__subtitle wow fadeInLeftShort" data-wow-duration="1s" data-wow-delay=".25s">
                        <?=$arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_DESC']['DISPLAY_VALUE']?>
                    </span>
                <?endif;?>
                <div class="add_link" style="">
                    <button type="button" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".5s">
                        <span><?=Loc::getMessage('TRY_DEMO')?></span>
                    </button>
                    <?if ($arResult["ADDITIONAL_LINK"]):?>
                        <a href="<?=$arResult["ADDITIONAL_LINK"]["URL"]?>" target="_blank" class="bn-btn bn-btn--bg add_link--item wow fadeIn">
                            <?=$arResult["ADDITIONAL_LINK"]["TEXT"]?>
                        </a>
                    <?endif;?>
                    <?if ($arResult["ADDITIONAL_LINK2"]):?>
                        <a href="<?=$arResult["ADDITIONAL_LINK2"]["URL"]?>" target="_blank" class="text--green add_link2--item">
                            <?=$arResult["ADDITIONAL_LINK2"]["TEXT"]?>
                        </a>
                    <?endif;?>
                </div>
            </div>

            <?if ($arResult['DISPLAY_PROPERTIES']['SVG_DETAIL_PICTURE']['FILE_VALUE']['SRC']):?>
                <div class="bn-hero-product__img">
                    <img src="<?=$arResult['DISPLAY_PROPERTIES']['SVG_DETAIL_PICTURE']['FILE_VALUE']['SRC']?>" alt="<?=$arResult["NAME"]?>">
                </div>
            <?endif;?>

            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--left.svg'?>" alt="elipse" class="bn-hero__elipse-left">
            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--right.svg'?>" alt="elipse" class="bn-hero__elipse-right">
        </div>
    </section>

<?if($arResult["DETAIL_TEXT"] <> ''):?>
    <section class="bn-about-product bn-about-product-<?=$prefix?>">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="text--green"><?=Loc::getMessage('ABOUT_PRODUCT')?></span>
            </h2>

            <div class="bn-about-product__box wow fadeInUpShort" data-wow-duration="1s">
                <?=$arResult["DETAIL_TEXT"]?>
            </div>
        </div>
    </section>
<?endif;?>

<?if ($arResult['HOW_WORK'] && is_array($arResult['HOW_WORK'])):?>
    <section class="bn-how-works">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?=Loc::getMessage('HOW_WORK_TITLE')?></h2>

            <div class="swiper information-slider i-s-api wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <div class="swiper-wrapper">
                    <?foreach ($arResult['HOW_WORK'] as $item):?>
                        <div class="swiper-slide information-slider__box">
                            <a href="<?=$item["PREVIEW_PICTURE_SRC"]?>" data-lightbox="data1">
                                <img src="<?=$item["PREVIEW_PICTURE_SRC"]?>" alt="<?=$item["NAME"]?>" class="information-slider__img">
                            </a>
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
            </div>

            <div class="bn-information__elipse wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1s"></div>

            <div class="swiper information-slider-text information-slider-text--number i-s-t-api wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <div class="swiper-wrapper">
                    <?foreach ($arResult['HOW_WORK'] as $key => $item):?>
                        <?if ($item['PREVIEW_TEXT']):?>
                            <div class="swiper-slide information-slider-text__box">
                                <span class="information-slider-text__number"><?=$key + 1?></span>
                                <p class="information-slider-text__text"><?=$item['PREVIEW_TEXT']?></p>
                            </div>
                        <?endif;?>
                    <?endforeach;?>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?endif;?>

<?if ($arResult['DISPLAY_PROPERTIES']['ADVANTAGES']['DISPLAY_VALUE'] && is_array($arResult['DISPLAY_PROPERTIES']['ADVANTAGES']['DISPLAY_VALUE'])):?>
    <section class="bn-benefits bn-product-benefits bn-benefits-product-<?=$prefix?>
     <?if (PRODUCT_ID__API != $arResult['ID']) echo 'bn-product-benefits--title'?> <?if (PRODUCT_ID__ELECTRONIC_MEETINGS == $arResult['ID']) echo 'bn-product-benefits--grid-two'?>">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="bn-text-elipse bn-text-elipse--large"><?=Loc::getMessage('ADVANTAGES_TITLE')?>
                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/text-elipse--large.svg'?>" alt="elipse">
                </span>
            </h2>

            <div class="bn-benefits__grid">
                <?foreach ($arResult['DISPLAY_PROPERTIES']['ADVANTAGES']['DISPLAY_VALUE'] as $key => $item):?>
                    <div class="bn-product-benefits__box wow fadeInUpShort" data-wow-duration="1s" data-wow-delay="<?=($key + 1) * 0.25?>s">
                        <span class="bn-product-benefits__text"><?=$item?></span>
                    </div>
                <?endforeach;?>
            </div>

            <button type="button" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <span><?=Loc::getMessage('TRY_DEMO')?></span>
            </button>
        </div>
    </section>
<?endif;?>

<?if ($arResult['DIRECTIONS'] && is_array($arResult['DIRECTIONS'])):?>
    <section class="bn-direction bn-product-direction">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?=Loc::getMessage('DIRECTIONS_TITLE')?></h2>

            <div class="bn-direction__grid">
                <?foreach ($arResult['DIRECTIONS'] as $key => $item):?>
                    <a href="<?=$item['URL']?>" class="bn-direction__box wow fadeInUpShort" data-wow-duration="1s">
                        <img src="<?=$item["PREVIEW_PICTURE_SRC"]?>" alt="<?=$item["NAME"]?>" class="bn-direction__img">
                        <span class="bn-direction__title"><?=$item['NAME']?></span>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>

    <section class="bn-calc">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_DIR."include/calc.php"
            ),
            false,
            Array(
                'HIDE_ICONS' => 'Y',
                'ACTIVE_COMPONENT' => ''
            )
        );
        ?>
    </section>

<? /* if ($arResult['KNOWLEDGE_BASE'] && is_array($arResult['KNOWLEDGE_BASE'])):?>
    <section class="bn-product-base-video">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?=Loc::getMessage('KNOWLEDGE_BASE_TITLE')?></h2>

            <div class="bn-video-footage">
                <?foreach ($arResult['KNOWLEDGE_BASE'] as $key => $item):?>
                    <a href="<?=$item['URL']?>" class="bn-video-footage__box wow fadeInUpShort" data-wow-duration="1s">
                        <div class="bn-video-footage__img-box">
                            <img class="bn-video-footage__img" src="<?=$item["PREVIEW_PICTURE_SRC"]?>" alt="<?=$item["NAME"]?>">
                            <div class="bn-video-footage__btn-video">
                                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                            </div>
                        </div>
                        <span class="bn-video-footage__title"><?=$item['NAME']?></span>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif; */ ?>

<?if (isset($arResult['_SECTIONS']) && is_array($arResult['_SECTIONS'])):?>
    <section class="bn-product-base-video">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?=Loc::getMessage('KNOWLEDGE_BASE_TITLE')?></h2>

            <div class="bn-video-footage">
                <?foreach($arResult["_SECTIONS"] as $id => $sect):?>
                    <?foreach($sect['ITEMS'] as $key => $arItem):?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-video-footage__box wow fadeInUpShort" data-wow-duration="1s">
                            <div class="bn-video-footage__img-box">
                                <img class="bn-video-footage__img" src="<?=$arItem["PREVIEW_PICTURE"]?>" alt="<?=$sect["NAME"]?>">

                                <div class="bn-video-footage-overlay">
                                    <div class="bn-video-footage-text"><?=count($arResult["_SECTIONS"][$id]["ITEMS"])?> видео</div>
                                    <div class="bn-video-footage__btn-video">
                                        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <span class="bn-video-footage__title"><?=$sect["NAME"]?></span>
                            <div class="bn-video-footage__subtitle"><?=$sect["DESCRIPTION"]?></div>
                        </a>
                        <?break;?>
                    <?endforeach;?>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>

    <section class="bn-request">
        <div class="bn-wrapper">
            <div class="bn-form bn-request__form wow fadeInUpShort" data-wow-duration="1s">
                <h3 class="bn-h3">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/feedback_title.php", Array(), Array("MODE" => "html"));?>
                </h3>

                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/feedback.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>

                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/form-elipse.svg'?>" alt="elipse" class="bn-form__elipse wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
                <div class="bn-form__square wow fadeInUpShort" data-wow-duration="1s" data-wow-delay="1.5s"></div>
            </div>
        </div>
    </section>

<?//PR($arResult);?>