<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Руководство администратора");
?><section class="bn-manual bn-min-h">
<div class="bn-wrapper">
	<h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>
	<div class="bn-manual__main">
		<h2></h2>
		<p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
			 В <strong>руководстве администратора Электронных собраний Bankro.TECH</strong> детально описан процесс работы с корпоративным аккаунтом компании. Там же детально описан процесс прикрепления к аккаунту, редактированию ролей.
		</p>
	</div>
 <br>
 <a class="bn-download" href="/files/meetings_admin_manual" target="_blank"> <img alt="pdf icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>">Руководство администратора Электронных собраний</a>&nbsp;<br>
	<div class="bn-manual__main">
		<p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
			 В <strong> руководстве администратора Сервисов "Автоматизация" и "Мониторинг" </strong> вы узнаете как заводить учетные записи новым пользователям и удалять старые, как настраивать доступы к делам и роли, а также научитесь мониторить активность пользователей в системе. Мы написали руководство пользователя простым языком и добавили скрины, чтобы вы точно знали, куда «тыкать».
		</p>
	</div>
 <br>
 <a class="bn-download" href="/files/admin_manual.pdf" target="_blank"> <img alt="pdf icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>">Руководство администратора</a>&nbsp;<br>
	<p>
 <br>
		 Если после прочтения руководства и просмотра видео у вас остались вопросы – обратитесь в службу поддержки по телефону&nbsp;<a href="tel:+74995503009">+7 (499) 550-30-09</a>&nbsp;или электронной почте&nbsp;<a href="mailto:support@bankro.tech">SUPPORT@BANKRO.TECH</a>.
	</p>
 <br>
 <br>
</div>
 </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>