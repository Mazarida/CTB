<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Руководство пользователя");
?><section class="bn-manual bn-min-h">
<div class="bn-wrapper">
	<h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>
	<div class="bn-manual__main">
		<p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
			 В <strong>руководстве пользователя Электронных собраний Bankro.TECH</strong> детально описан процесс организации и участия в электронном собрании или заседании комитета кредиторов. Там же детально описана логика подсчета голосов и определения кворума.
		</p>
	</div>
 <br>
 <a class="bn-download" href="/files/meetings_user_manual.pdf" target="_blank"> <img alt="pdf icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>">Руководство пользователя Электронных собраний </a> <br>
	<div class="bn-manual__main">
		<p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
			 В <strong>руководстве пользователя Bankro.TECH</strong> представлена информация о том, как именно использовать функционал «Мониторинга» и «Автоматизации», чтобы решить ваши задачи в банкротстве. Там представлена информация о том, как войти в систему, создать карточку дела, поставить контрагента на мониторинг, экспортировать реестр требований кредиторов в XLSX и многое другое.
		</p>
	</div>
 <br>
 <a class="bn-download" href="/files/user_manual.pdf" target="_blank"> <img alt="pdf icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>">Руководство пользователя </a> <br>
	<div class="bn-manual__main">
		<p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
			 Мы написали руководства пользователя простым языком и добавили скрины, чтобы вы точно знали, куда «тыкать». <br>
 <br>
			 Скачать руководства пользователя можно выше. Если после прочтения руководства у вас остались вопросы – обратитесь в службу поддержки по телефону <a href="tel:+74995503009">+7 (499) 550-30-09</a> или электронной почте <a href="mailto:support@bankro.tech">SUPPORT@BANKRO.TECH</a>.
		</p>
	</div>
</div>
 </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>