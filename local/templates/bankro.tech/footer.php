<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

</main>

<footer class="bn-footer wow fadeInUpShort" data-wow-duration="1s">
    <div class="bn-wrapper">
        <div class="bn-footer__block">
            <div class="bn-footer__colum">
                <a href="<?=SITE_DIR?>" class="bn-logo">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/logo.php", Array(), Array("MODE" => "html"));?>
                </a>
                <a href="/files/privacy_policy.pdf" class="bn-footer__link bn-underline" target="_blank">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/footer/privacy_policy_title.php", Array(), Array("MODE" => "html"));?>
                </a>
                <?$APPLICATION->IncludeFile(SITE_DIR."/include/footer/email.php", Array(), Array("MODE" => "html"));?>
            </div>
            <?
            $APPLICATION->IncludeComponent("bitrix:menu", "footer",
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
                    "ROOT_MENU_TYPE" => "bottom1",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                false
            );
            ?>
            <?
            $APPLICATION->IncludeComponent("bitrix:menu", "footer",
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
                    "ROOT_MENU_TYPE" => "bottom2",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                false
            );
            ?>
            <?
            $APPLICATION->IncludeComponent("bitrix:menu", "footer",
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
                    "ROOT_MENU_TYPE" => "bottom3",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                false
            );
            ?>
        </div>

        <span class="bn-footer__copyright">© Bankro.tech <?=date("Y")?> Все права защищены.</span>
    </div>
</footer>

<div class="bn-overlay">
    <div class="bn-modal-wrapper">
        <div id="js-show-expert-info" class="bn-modal bn-modal-experts"></div>

        <div class="bn-modal bn-modal-request">
            <div class="bn-form bn-request__form">
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
                        "PATH" => SITE_DIR."include/feedback_modal.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>

                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/form-elipse.svg'?>" alt="elipse" class="bn-form__elipse">
                <div class="bn-form__square"></div>
            </div>

            <button type="button" class="bn-btn-close">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/close.svg'?>" alt="close icon" class="bn-btn-close__close">
            </button>
        </div>

        <div class="bn-modal bn-modal-request-1">
            <div class="bn-form bn-request__form">
                <h3 class="bn-h3">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/feedback_title_1.php", Array(), Array("MODE" => "html"));?>
                </h3>

                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/feedback_modal_1.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>

                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/form-elipse.svg'?>" alt="elipse" class="bn-form__elipse">
                <div class="bn-form__square"></div>
            </div>

            <button type="button" class="bn-btn-close">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/close.svg'?>" alt="close icon" class="bn-btn-close__close">
            </button>
        </div>

        <div class="bn-modal bn-modal-contact-us">
            <div class="bn-form bn-contact-us__from">
                <h3 class="bn-h3">
                    <?$APPLICATION->IncludeFile(SITE_DIR."/include/feedback_manager_title.php", Array(), Array("MODE" => "html"));?>
                </h3>

                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/feedback_manager_modal.php"
                    ),
                    false,
                    Array(
                        'HIDE_ICONS' => 'Y',
                        'ACTIVE_COMPONENT' => ''
                    )
                );
                ?>

                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/form-elipse.svg'?>" alt="elipse" class="bn-form__elipse">
                <div class="bn-form__square"></div>
            </div>

            <button type="button" class="bn-btn-close">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/close.svg'?>" alt="close icon" class="bn-btn-close__close">
            </button>
        </div>

        <div class="bn-modal bn-modal-invoice">
            <div class="bn-form bn-request__form">
                <h3 class="bn-h3">Создать счет-оферту</h3>

                <form action="#" method="post">
                    <div class="js-invoice-msg" style="display:none;color:red;padding-bottom:15px;"></div>

                    <select name="bank" class="bn-select bn-select--invoice">
                        <option value=""></option>
                        <option value="ПАО Сбербанк">ПАО Сбербанк</option>
                    </select>
                    <input type="text" name="bik" class="bn-input" placeholder="БИК" />
                    <input type="text" name="kpp" class="bn-input" placeholder="КПП" />
                    <input type="text" name="inn" class="bn-input" placeholder="ИНН" />
                    <input type="text" name="account_number" class="bn-input" placeholder="Номер счета" />
                    <input type="text" name="company_name" class="bn-input" placeholder="Название компании" />

                    <button type="submit" class="bn-btn bn-btn--bg js-invoice-pdf"><span class="bn-btn__text">Сформировать</span></button>

                    <label class="bn-checked-square">
                        <input type="checkbox" name="agreement" value="Y" checked>
                        <span class="bn-checked-square__square"></span>
                        <span class="bn-checked-square__text">
                            Я согласен с <a href="/files/user_agreement.docx" download="user_agreement.docx">Политикой обработки персональных данных</a> и <a href="/files/privacy_policy.pdf" target="_blank">Политикой Конфиденциальности</a>
                        </span>
                    </label>
                </form>
            </div>

            <button type="button" class="bn-btn-close">
                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/close.svg'?>" alt="close icon" class="bn-btn-close__close">
            </button>
        </div>
    </div>
</div>

<div class="bm-mobile-menu" style="display: none;">
    <button class="bn-btn-menu bn-btn-menu--close">
        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/btn-mobile-menu-close.svg'?>" alt="menu hamburger">
    </button>
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
    <div class="bn-header__group">
        <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/phone.php", Array(), Array("MODE" => "html"));?>
        <?$APPLICATION->IncludeFile(SITE_DIR."/include/header/email.php", Array(), Array("MODE" => "html"));?>
    </div>
</div>

<?if (!isset($_COOKIE['info_cookies'])):?>
    <?$APPLICATION->IncludeFile(SITE_DIR."/include/footer/info_cookies.php", Array(), Array("MODE" => "html"));?>
<?endif;?>

</body>
</html>