<?include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>

<h2 class="inner-title"><?$APPLICATION->ShowTitle(false)?></h2>

<div class="bn-404">
    <div class="bn-wrapper">
        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/404.svg'?>" alt="404 icon" class="bn-404__image wow fadeInUpShort" data-wow-duration="1s">

        <span class="bn-404__text wow fadeInUpShort" data-wow-duration="1s" data-wow-delay=".25s">
            <?$APPLICATION->IncludeFile(SITE_DIR."/include/404/404_text.php", Array(), Array("MODE" => "html"));?>
        </span>

        <a href="<?=SITE_DIR?>" class="bn-btn bn-btn--bg wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".5s">
            <span><?$APPLICATION->IncludeFile(SITE_DIR."/include/404/404_link.php", Array(), Array("MODE" => "html"));?></span>
        </a>
    </div>

    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--left.svg'?>" alt="elipse" class="bn-hero__elipse-left">
    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-elipse--right.svg'?>" alt="elipse" class="bn-hero__elipse-right">
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
