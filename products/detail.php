<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Продукт");
?>
<?
$APPLICATION->IncludeComponent("bitrix:news.detail", "products",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
        "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        //"CACHE_TYPE" => "A",	// Тип кеширования
        "CACHE_TYPE" => "N",	// Тип кеширования
        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
        "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
        "DISPLAY_DATE" => "N",	// Выводить дату элемента
        "DISPLAY_NAME" => "Y",	// Выводить название элемента
        "DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],	// Код новости
        "ELEMENT_ID" => "",	// ID новости
        "FIELD_CODE" => array(	// Поля
            0 => "",
            1 => "",
        ),
        "FILE_404" => "",	// Страница для показа (по умолчанию /404.php)
        "IBLOCK_ID" => IBLOCK_ID__PRODUCTS,	// Код информационного блока
        "IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
        "IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
        "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
        "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
        "PAGER_TITLE" => "Страница",	// Название категорий
        "PROPERTY_CODE" => array(	// Свойства
            0 => "DETAIL_PAGE_TITLE",
            1 => "DETAIL_PAGE_DESC",
            2 => "SVG_DETAIL_PICTURE",
            3 => "HOW_WORK",
            4 => "ADVANTAGES",
            5 => "DIRECTIONS",
            6 => "KNOWLEDGE_BASE",
            7 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
        "SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
        "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "Y",	// Устанавливать статус 404
        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
        "SHOW_404" => "Y",	// Показ специальной страницы
        "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
        "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
        "USE_SHARE" => "N",	// Отображать панель соц. закладок
    ),
    false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>