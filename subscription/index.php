<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Подписка и тарифы");
?><section class="bn-about-subscription">
<div class="bn-wrapper">
	<h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>
 <span class="bn-about-subscription__text wow fadeIn" data-wow-duration="2s">Вы можете ознакомиться с нашими ценами ниже. Посчитать и сформировать согласно указанному прайсу ваш личный пакет продуктов Bankro.TECH по подписке поможет калькулятор<br>
 <br>
	 Хотите получить специальные&nbsp;условия сотрудничества? Обратитесь к нашим менеджерам!<br>
	<br>
	 &nbsp;</span><a class="bn-download" href="/files/tariffs.pdf" target="_blank" style="padding-top: 30px;"><img alt="pdf icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>">Тарифы </a>
</div>
 </section> <section class="bn-calc">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."include/calc.php"
	),
false,
Array(
	'HIDE_ICONS' => 'Y',
	'ACTIVE_COMPONENT' => ''
)
);?> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>