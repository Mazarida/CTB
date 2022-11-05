<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Карта сайта");
?>

    <section class="bn-manual bn-min-h">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>

            <div class="bn-manual__main bn-site-map">
                <?
                $APPLICATION->IncludeComponent("bitrix:main.map", "site_map",
                    Array(
                        "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "COL_NUM" => "1",	// Количество колонок
                        "LEVEL" => "3",	// Максимальный уровень вложенности (0 - без вложенности)
                        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                        "SHOW_DESCRIPTION" => "N",	// Показывать описания
                    ),
                    false
                );
                ?>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>