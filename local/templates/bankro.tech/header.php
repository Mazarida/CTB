<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();
$assets = \Bitrix\Main\Page\Asset::getInstance();
?>

<!doctype html>
<html prefix="og: http://ogp.me/ns#" lang="<?=LANGUAGE_ID?>">
<head>

<?/*
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
  (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
  m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
  (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

  ym(88074752, "init", {
        clickmap:true,
       trackLinks:true,
       accurateTrackBounce:true,
       webvisor:true
  });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88074752" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
*/?>

    <meta charset="<?=SITE_CHARSET?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <title><?$APPLICATION->ShowTitle();?></title>

    <?
    /**
     * CSS
     */
    $assets->addCss(SITE_TEMPLATE_PATH.'/static/css/fonts.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/lightbox/css/lightbox.min.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/css/main.css');
    //$assets->addCss(SITE_TEMPLATE_PATH.'/static/css/mobile.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/css/custom.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/css/main_vw.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/static/css/mobile_vw.css');
    $assets->addCss(SITE_TEMPLATE_PATH.'/css/custom_vw.css');

    /**
     * JS
     */
    $assets->addJs(SITE_TEMPLATE_PATH."/static/js/jquery-3.6.0.min.js");
	$assets->addJs(SITE_TEMPLATE_PATH."/static/js/jquery.cookie.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/static/js/wow.min.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/static/js/parallax.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/static/js/select2.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/js/index.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/static/js/custom.js");
    $assets->addJs(SITE_TEMPLATE_PATH."/lightbox/js/lightbox.min.js");

    /**
     * FAVICON
     */
    $assets->addString('<link href="'.SITE_TEMPLATE_PATH.'/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />');

    /**
     * BITRIX->ShowHead()
     */
    $APPLICATION->ShowMeta("robots", false);
    $APPLICATION->ShowMeta("keywords", false);
    $APPLICATION->ShowMeta("description", false);
    $APPLICATION->ShowLink("canonical", null);
    $APPLICATION->ShowCSS(true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    ?>
</head>

<body>

<?$APPLICATION->ShowPanel()?>

<header class="bn-header wow fadeInDownShort" data-wow-duration="1s">
    <div class="bn-header__box">
        <div class="bn-wrapper">
            <button class="bn-btn-menu bn-btn-menu--open">
                <img src="<?=SITE_TEMPLATE_PATH."/static/images/btn-mobile-menu-hamburger.svg"?>" alt="menu hamburger">
            </button>

            <a href="<?=SITE_DIR?>" class="bn-logo"><?$APPLICATION->IncludeFile(SITE_DIR."/include/logo.php", Array(), Array("MODE" => "html"));?></a>

            <div class="bn-menu">
                <div class="bn-menu__item">
                    <div class="bn-menu__btn">
                        <span class="bn-menu__title">
                            <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/directions_title.php", Array(), Array("MODE" => "text"));?>
                        </span>
                        <img src="<?=SITE_TEMPLATE_PATH."/static/images/menu-arrow--down.svg"?>" alt="arrow" class="bn-menu__arrow">
                    </div>

                    <div class="bn-menu__show">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:menu", "top",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top_directions",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                            false
                        );
                        ?>
                    </div>
                </div>
                <div class="bn-menu__item">
                    <div class="bn-menu__btn">
                        <span class="bn-menu__title">
                            <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/products_title.php", Array(), Array("MODE" => "text"));?>
                        </span>
                        <img src="<?=SITE_TEMPLATE_PATH."/static/images/menu-arrow--down.svg"?>" alt="arrow" class="bn-menu__arrow">
                    </div>
                    <div class="bn-menu__show">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:menu", "top",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top_products",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                            false
                        );
                        ?>
                    </div>
                </div>
            </div>

            <div class="bn-header__group">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/phone.php", Array(), Array("MODE" => "html"));?>
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/email.php", Array(), Array("MODE" => "html"));?>
            </div>
        </div>
    </div>
</header>

<nav class="bn-nav wow fadeInDown" data-wow-duration="1s">
    <div class="bn-wrapper">
        <?
        $APPLICATION->IncludeComponent("bitrix:menu", "main",
            Array(
                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                    0 => "",
                ),
                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                "ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
            false
        );
        ?>
    </div>
</nav>

<main>