<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Библиотека");
?>

    <section class="bn-typical">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><span class="text--green"><?$APPLICATION->ShowTitle(false);?></span></h2>
            <span class="bn-typical__text wow fadeInUpShort" data-wow-duration="1s">
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/library/library_desc.php", Array(), Array("MODE" => "html"));?>
            </span>

            <?
            $tags = array();
            if (\Bitrix\Main\Loader::includeModule('iblock')) {
                $arSelect = Array("ID", "IBLOCK_ID", "NAME", "TAGS");
                $arFilter = Array("IBLOCK_ID" => IBLOCK_ID__LIBRARY, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                while ($el = $res->Fetch()) {
                    if (!empty($el["TAGS"])) {
                        $arTags = explode(', ', $el["TAGS"]);
                        foreach ($arTags as $tag) {
                            if (!in_array($tag, $tags)) {
                                $tags[] = $tag;
                            }
                        }
                    }
                }
            }
            ?>

            <?if (!empty($tags)):?>
                <div class="bn-filter wow fadeInUpShort" data-wow-duration="1s">
                    <?
                    asort($tags);
                    foreach ($tags as $tag):?>
                        <a href="?tag=<?=$tag?>" class="bn-filter__box">
                            <input type="checkbox" <?if (isset($_GET['tag']) && $_GET['tag'] == $tag) echo 'checked'?>>
                            <span class="bn-filter__title">#<?=mb_ucfirst($tag)?></span>
                            <span class="bn-filter__bg"></span>
                        </a>
                    <?endforeach;?>
                </div>
            <?endif;?>

            <?
            $tag = trim($_GET['tag']);
            if ($tag) {
                $GLOBALS['arrFilter'] = array("TAGS" => "%{$tag}%");
            }
            ?>

            <?
            $APPLICATION->IncludeComponent("bitrix:news.list", "news",
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
                    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
                    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                    "DISPLAY_NAME" => "Y",	// Выводить название элемента
                    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                    "FIELD_CODE" => array(	// Поля
                        //0 => "TAGS",
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_NAME" => "arrFilter",	// Фильтр
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                    "IBLOCK_ID" => IBLOCK_ID__LIBRARY,	// Код информационного блока
                    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
                    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                    "NEWS_COUNT" => "9",	// Количество новостей на странице
                    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                    "PAGER_TEMPLATE" => "bankro",	// Шаблон постраничной навигации
                    "PAGER_TITLE" => "Библиотека",	// Название категорий
                    "PARENT_SECTION" => "",	// ID раздела
                    "PARENT_SECTION_CODE" => "",	// Код раздела
                    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                    "PROPERTY_CODE" => array(	// Свойства
                        0 => "",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
                    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                    "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
                    "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
                    "SET_STATUS_404" => "Y",	// Устанавливать статус 404
                    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                    "SHOW_404" => "Y",	// Показ специальной страницы
                    "SORT_BY1" => "PROPERTY_IS_TOP",	// Поле для первой сортировки новостей
                    "SORT_BY2" => "ACTIVE_FROM",	// Поле для второй сортировки новостей
                    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                    "SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
                    "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                ),
                false
            );
            ?>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>