<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

if (!$USER->IsAdmin()) {
    LocalRedirect(SITE_DIR);
}

$APPLICATION->SetTitle("Тестовая страница");
?>
<div>
	 <?$APPLICATION->ShowTitle(false);?>
</div>

<? // if (mail("medvedgreez@yandex.ru","test subject", "test body","From: info@bankro.tech")) echo "Сообщение передано функции mail, проверьте почту в ящике."; else echo "Функция mail не работает, свяжитесь с администрацией хостинга.";?>

<div>
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>