<?
$APPLICATION->IncludeComponent("emotion:main.feedback", "manager_request",
    Array(
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_SHADOW" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        //"EMAIL_TO" => "medvedgreez@yandex.ru",	// E-mail, на который будет отправлено письмо
        "EMAIL_TO" => "",	// E-mail, на который будет отправлено письмо
        "EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
            0 => "33",
        ),
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
        "REQUIRED_FIELDS" => array(	// Обязательные поля для заполнения
            0 => "NAME",
			1 => "EMAIL",
            2 => "PHONE",
            3 => "MESSAGE",
            4 => "AGREEMENT",
        ),
        "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
        "COMPONENT_TEMPLATE" => "manager_request"
    ),
    false
);
