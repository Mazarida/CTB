<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("bankro.tech - единая система по ведению процедур банкротства");
?>

    <section class="bn-hero">
        <div class="bn-wrapper">
            <div class="bn-hero__colum">
                <h1 class="bn-h1 wow fadeInLeftShort" data-wow-duration="1s"><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/main_title.php", Array(), Array("MODE" => "html"));?></h1>
                <span class="bn-hero__subtitle wow fadeInLeftShort" data-wow-duration="1s" data-wow-delay=".5s"><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/main_desc.php", Array(), Array("MODE" => "html"));?></span>

                <a href="javascript:void(0);" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1s">
                    <span><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/main_desc_link.php", Array(), Array("MODE" => "html"));?></span>
                </a>
            </div>

            <div class="bn-hero__img">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-main-img.svg'?>" alt="main images">
            </div>

            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--left.svg'?>" alt="elipse" class="bn-hero__elipse-left">
            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--right.svg'?>" alt="elipse" class="bn-hero__elipse-right">
        </div>
    </section>

    <section class="bn-created-experts">
        <div class="bn-created-experts__wrapper">
            <div class="bn-created-experts__colum wow fadeIn" data-wow-duration="1.5s">
                <div dir="rtl" class="swiper expert-slider">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/main_page/experts_list.php"
                        ),
                        false,
                        Array(
                            'HIDE_ICONS' => 'Y',
                            'ACTIVE_COMPONENT' => ''
                        )
                    );
                    ?>
                </div>
            </div>
        </div>

        <div class="bn-created-experts__wrapper">
            <div class="bn-created-experts__colum">
                <h2 class="bn-h2 bn-h2--desktop wow fadeInRightShort" data-wow-duration="1s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/experts_title.php", Array(), Array("MODE" => "html"));?>
                </h2>
                <span class="bn-created-experts__description wow fadeInRightShort" data-wow-duration="1s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/experts_desc.php", Array(), Array("MODE" => "html"));?>
                </span>

                <a href="/about/" class="bn-btn bn-btn--br wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                    <span><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/experts_link_text.php", Array(), Array("MODE" => "html"));?></span>
                </a>
            </div>
        </div>

        <h2 class="bn-h2 bn-h2--mobile wow fadeInRightShort" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInRightShort;">
            <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/experts_title.php", Array(), Array("MODE" => "html"));?>
        </h2>
    </section>

    <section class="bn-partnership">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/partners_title.php", Array(), Array("MODE" => "html"));?>
            </h2>

            <div class="swiper partnership-slider wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/main_page/partners_list.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>
            </div>
        </div>
    </section>

    <section class="bn-information">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><span class="text--green">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/info_slider_title.php", Array(), Array("MODE" => "html"));?>
            </h2>

            <?
            $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."include/main_page/info_slider_list.php"
                ),
                false,
                Array(
                    'HIDE_ICONS' => 'Y',
                    'ACTIVE_COMPONENT' => ''
                )
            );
            ?>
        </div>
    </section>

    <section class="bn-software">
        <div class="bn-wrapper">
            <div class="bn-software__colum">
                <h2 class="bn-h2 wow fadeInLeftShort" data-wow-duration="1s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/about_po_title.php", Array(), Array("MODE" => "html"));?>
                </h2>
                <span class="bn-software__text wow fadeInLeftShort" data-wow-duration="1s" data-wow-delay=".25s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/about_po_desc.php", Array(), Array("MODE" => "html"));?>
                </span>

                <a href="https://reestr.digital.gov.ru/" target="_blank" class="bn-btn-text bn-btn-text--green wow fadeIn" data-wow-duration="1s" data-wow-delay=".5s" style="text-decoration-color: currentColor;font-weight: 400;">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/about_po_link.php", Array(), Array("MODE" => "html"));?>
                </a>
            </div>

            <div class="bn-software__colum wow fadeIn" data-wow-duration="2s" data-wow-offset="200">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/domestic-software.svg" alt="domestic software image'?>" class="bn-software__img">
            </div>

            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/domestic-software__elipse.svg"'?> alt="desing elipse" class="bn-software__elipse">
        </div>
    </section>

    <section class="bn-benefits">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="bn-text-elipse bn-text-elipse--large">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/advantages_title.php", Array(), Array("MODE" => "html"));?>
                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/text-elipse--large.svg'?>" alt="elipse">
                </span>
            </h2>

            <?
            $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."include/main_page/advantages_list.php"
                ),
                false,
                Array(
                    'HIDE_ICONS' => 'Y',
                    'ACTIVE_COMPONENT' => ''
                )
            );
            ?>

            <a href="javascript:void(0);" class="bn-btn bn-btn--bg btn--demo wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <span><?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/main_desc_link.php", Array(), Array("MODE" => "html"));?></span>
            </a>
            <a href="javascript:void(0);" class="bn-btn-text bn-btn-text--green btn--contact-us wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/feedback_link_text.php", Array(), Array("MODE" => "html"));?>
            </a>
        </div>
    </section>

    <section class="bn-direction">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/directions_title.php", Array(), Array("MODE" => "html"));?>
            </h2>

            <?
            $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."include/main_page/directions_list.php"
                ),
                false,
                Array(
                    'HIDE_ICONS' => 'Y',
                    'ACTIVE_COMPONENT' => ''
                )
            );
            ?>
        </div>
    </section>

    <section class="bn-products">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="bn-text-elipse bn-text-elipse--small">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/products_title.php", Array(), Array("MODE" => "html"));?>
                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/text-elipse--small.svg'?>" alt="elipse">
                </span>
            </h2>

            <div class="swiper slider-products wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/main_page/products_list.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>
            </div>
        </div>
    </section>

    <section class="bn-subscription">
        <div class="bn-wrapper">
            <div class="bn-subscription__colum">
                <h2 class="bn-h2 wow fadeInLeftShort" data-wow-duration="1s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/subscription_title.php", Array(), Array("MODE" => "html"));?>
                </h2>

                <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/subscription_desc.php", Array(), Array("MODE" => "html"));?>

                <a href="/subscription/" class="bn-btn-text bn-btn-text--green wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/main_page/subscription_link_text.php", Array(), Array("MODE" => "html"));?>
                </a>
            </div>


            <div class="bn-subscription__colum wow fadeIn" data-wow-duration="2s" data-wow-offset="200">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/bn-subscription__image.svg'?>" alt="subscription image" class="bn-subscription__img">
            </div>
        </div>
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>