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

//$ext_template = false;
//if ($arResult['PROPERTIES']['IS_EXTENDED_TEMPLATE']['VALUE_ENUM_ID'] == 1) {
//    $ext_template = true;
//}
?>

    <script>
        jQuery(function($){
            if (typeof window.initScroll === "undefined") {
                $(window).scroll(function(){
                    console.log("scrolls");
                    if ($('.slider-products__iframe').length == 0 && $('.slider-products__video-src').length > 0) {
                        if ($(document).scrollTop() + $(window).height()*3 > $('.slider-products__video-src').offset().top) {
                            window.vidsInit = true;
                            $('.slider-products__video-src').each(function() {
                                let uri = $(this).attr("data-src");
                                $(this).after($('<iframe class="slider-products__iframe" width="100%" height="100%" src="'+uri+'" frameborder="0" allowfullscreen></iframe>'))
                            });
                        }
                    }
                });
                $(window).scroll();
                window.initScroll = true
            }
        });
    </script>

    <section class="bn-hero-direction">
        <div class="bn-wrapper">
            <div class="bn-hero-product__colum">
                <?if ($arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_TITLE']['DISPLAY_VALUE']):?>
                    <h1 class="bn-h1 wow fadeInLeftShort" data-wow-duration="1s"><?=$arResult['DISPLAY_PROPERTIES']['DETAIL_PAGE_TITLE']['~VALUE']?></h1>
                <?endif;?>

                <button type="button" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".5s">
                    <span><?=Loc::getMessage('TRY_DEMO')?></span>
                </button>
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

<?if ($arResult['PROBLEMS'] && is_array($arResult['PROBLEMS'])):?>
    <section class="bn-task-set">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?=Loc::getMessage('PROBLEMS_TITLE_BANKS_KP')?></h2>

            <div class="bn-task-set__main">
                <?
                $number = 1;
                foreach ($arResult['PROBLEMS'] as $item):
                    ?>

                    <div class="bn-task-set__row">
                        <div class="bn-task-set__colum wow fadeInUpShort" data-wow-duration="1s">
                            <?if ($item['TASK_TITLE']):?>
                                <h3 class="bn-h3"><?=Loc::getMessage('PREFIX_TASK_TITLE') . $item['TASK_TITLE']?></h3>
                            <?endif;?>

                            <?if ($item['TASK_DESC']):?>
                                <span class="bn-task-set__text"><?=$item['TASK_DESC']?></span>
                            <?endif;?>
                        </div>

                        <div class="bn-task-set__colum wow fadeInUpShort" data-wow-duration="1s">
                            <?if ($item['PREVIEW_PICTURE_SRC']):?>
                                <div class="bn-task-set__img">
                                    <div class="slider-products__group">
                                        <img src="<?=$item["PREVIEW_PICTURE_SRC"]?>" alt="<?=$item["NAME"]?>" class="bn-task-set__images">

                                        <div class="slider-products__video-src" data-src="<?=$item['PRODUCT']["SCREENCAST"]?>"></div>
                                    </div>

                                    <?if ($item['PRODUCT']['PREVIEW_PICTURE_SRC']):?>
                                        <div class="bn-task-set__icon">
                                            <img src="<?=$item['PRODUCT']["PREVIEW_PICTURE_SRC"]?>" alt="<?=$item['PRODUCT']["NAME"]?>">
                                        </div>
                                    <?endif;?>
                                </div>
                            <?endif;?>
                        </div>
                    </div>

                    <div class="bn-task-set__row bn-task-set__br-bottom">
                        <div class="bn-task-set__colum bn-quote--black wow fadeInUpShort" data-wow-duration="1s">
                            <?if ($item['SOLUTION_TITLE']):?>
                                <h3 class="bn-h3"><?=Loc::getMessage('PREFIX_SOLUTION_TITLE') . $item['SOLUTION_TITLE']?></h3>
                            <?endif;?>

                            <?if ($item['SOLUTION_DESC']):?>
                                <span class="bn-task-set__text"><?=$item['SOLUTION_DESC']?></span>
                            <?endif;?>

                            <?if ($item['PRODUCT']['URL']):?>
                                <a href="<?=$item['PRODUCT']['URL']?>" class="bn-btn-text bn-btn-text--green"><?=Loc::getMessage('LINK_MORE_TITLE')?></a>
                            <?endif;?>
                        </div>

                        <div class="bn-task-set__colum wow fadeInUpShort" data-wow-duration="1s">
                            <?if ($item['VALUE_DESC']):?>
                                <div class="bn-task-set__text-box">
                                    <span class="bn-task-set__title"><?=Loc::getMessage('VALUE_TITLE')?></span>
                                    <span class="bn-task-set__text"><?=$item['VALUE_DESC']?></span>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                    <?
                    $number++;
                endforeach;
                ?>
            </div>

            <button type="button" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".5s"><span><?=Loc::getMessage('TRY_DEMO')?></span></button>
        </div>
    </section>
<?endif;?>

    <section class="bn-subscription">
        <div class="bn-wrapper">
            <div class="bn-subscription__colum">
                <h2 class="bn-h2 wow fadeInLeftShort" data-wow-duration="1s"><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/subscription_title.php", Array(), Array("MODE" => "html"));?></h2>
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/subscription_desc.php", Array(), Array("MODE" => "html"));?>

                <a href="/subscription/" class="bn-btn-text bn-btn-text--green wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s"><?=Loc::getMessage('LINK_MORE_TITLE')?></a>
            </div>


            <div class="bn-subscription__colum wow fadeIn" data-wow-duration="2s" data-wow-offset="200">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/bn-subscription__image.svg'?>" alt="subscription image" class="bn-subscription__img">
            </div>
        </div>
    </section>

    <section class="bn-our-product">
        <div class="bn-wrapper">
            <div class="bn-our-product__colum wow fadeIn" data-wow-duration="2s" data-wow-offset="200">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/our-product-software.svg'?>" alt="domestic software image" class="bn-our-product__img">
            </div>
            <div class="bn-our-product__colum wow fadeInRIghtShort" data-wow-duration="1s">
                <h2 class="bn-h2"><?$APPLICATION->IncludeFile(SITE_DIR."/include/direction_page/about_po_title.php", Array(), Array("MODE" => "html"));?></h2>
                <span class="bn-our-product__text"><?$APPLICATION->IncludeFile(SITE_DIR."/include/direction_page/about_po_desc.php", Array(), Array("MODE" => "html"));?></span>
                <a href="https://reestr.digital.gov.ru/" target="_blank" class="bn-btn-text bn-btn-text--green" style="text-decoration: underline; font-weight: 400;">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/direction_page/about_po_link.php", Array(), Array("MODE" => "html"));?>
                </a>
            </div>
        </div>
    </section>

    <section class="bn-how-works bn-direction-reviews">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->IncludeFile(SITE_DIR."/include/direction_page/reviews_title.php", Array(), Array("MODE" => "html"));?></h2>

            <div class="swiper information-slider slider-reviews wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/direction_page/reviews.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>
            </div>

            <div class="bn-information__elipse wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1s"></div>
        </div>
    </section>

    <section class="bn-calc bn-direction-calc">
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

<? //PR($arResult);?>