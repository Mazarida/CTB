<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("План развития");
?>

    <section class="bn-dev-plan">
        <div class="bn-wrapper">
            <h2 class="bn-h2 bn-dev-plan__h2 wow fadeInUpShort" data-wow-duration="1s"><span class="text--green"><?$APPLICATION->ShowTitle(false);?></span></h2>
            <span class="bn-dev-plan__subtitle wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->IncludeFile(SITE_DIR."/include/development_plan_page/subtitle.php", Array(), Array("MODE" => "html"));?></span>

            <div class="swiper slider-dev-plan wow fadeIn" data-wow-duration="2s">
                <?
                $APPLICATION->IncludeComponent("bitrix:news.list", "development_plan",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                        "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
                        "AJAX_MODE" => "N",	// Включить режим AJAX
                        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                        "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                        "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                        "DISPLAY_DATE" => "N",	// Выводить дату элемента
                        "DISPLAY_NAME" => "Y",	// Выводить название элемента
                        "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
                        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                        "FIELD_CODE" => array(	// Поля
                            0 => "TAGS",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",	// Фильтр
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                        "IBLOCK_ID" => IBLOCK_ID__DEVELOPMENT_PLAN,	// Код информационного блока
                        "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
                        "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                        "NEWS_COUNT" => "999999",	// Количество новостей на странице
                        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                        "PAGER_TEMPLATE" => "bankro",	// Шаблон постраничной навигации
                        "PAGER_TITLE" => "Страница",	// Название категорий
                        "PARENT_SECTION" => "",	// ID раздела
                        "PARENT_SECTION_CODE" => "",	// Код раздела
                        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                        "PROPERTY_CODE" => array(	// Свойства
                            0 => "TIME_LABEL",
                            1 => "",
                        ),
                        "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
                        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                        "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
                        "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
                        "SET_STATUS_404" => "Y",	// Устанавливать статус 404
                        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                        "SHOW_404" => "Y",	// Показ специальной страницы
                        "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
                        "SORT_BY2" => "property_TIME_LABEL",	// Поле для второй сортировки новостей
                        "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
                        "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                        "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                    ),
                    false
                );
                ?>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>