<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("О нас");
?>

<div>
    <section class="bn-about-us">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><span class="text--green"><?$APPLICATION->ShowTitle(false);?></span></h2>

            <div class="bn-about-us__main">
				<div class="bn-about-us-slider wow fadeIn" data-wow-duration="2s">
					<div class="bn-video-box">
						<video autoplay muted class="bn-video" src="/files/about_video.mp4"></video>
						<div class="bn-video__overlay" style="background:none;height: 85%;">
							<div class="bn-video-footage__btn-video" style="opacity: 0;">
								<img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
							</div>
						</div>
					</div>
				</div>
				<?/*
				<div class="swiper bn-about-us-slider wow fadeIn" data-wow-duration="2s">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/about_page/about_list.php"
                        ),
                        false,
                        Array(
                            'HIDE_ICONS' => 'Y',
                            'ACTIVE_COMPONENT' => ''
                        )
                    );
                    ?>
                </div>
				*/?>

                <div class="bn-about-us__colum bn-about-slider-text wow fadeInUpShort" data-wow-duration="1s">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/about_page/about_desc.php", Array(), Array("MODE" => "html"));?>
                </div>
            </div>
        </div>
    </section>

    <section class="bn-experts">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="text--green"><?$APPLICATION->IncludeFile(SITE_DIR."/include/about_page/experts_title.php", Array(), Array("MODE" => "html"));?></span>
            </h2>

            <?
            $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."include/about_page/experts_list.php"
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
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
