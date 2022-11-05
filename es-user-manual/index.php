<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Электронные собрания. Руководство пользователя");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
    <section class="bn-manual bn-min-h">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>

            <div class="bn-manual__main">
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    В руководстве пользователя по электронным собраниям представлена полная информация как для организаторов, так и для участников собраний в банкротстве. Мы описали, как войти в систему, создать собрание, сформировать повестку и пригласить участников на ваше собрание.
					<br/><br/>
					Участники могут узнать из руководства пользователя, как им зарегистрироваться в системе, скачать материалы собрания, проголосовать и ознакомиться с результатами. Мы написали руководство пользователя простым языком и добавили скрины, чтобы вы точно знали, куда «тыкать».
					<br/><br/>
					Скачать руководство пользователя можно ниже. Видео-руководство пользователя можно посмотреть в разделе <a href="/knowledge-base/">«База знаний»</a>.
					<br/><br/>
					Если после прочтения руководства и просмотра видео у вас остались вопросы – обратитесь в службу поддержки по телефону <a href="tel:+74995503009">+7 (499) 550-30-09</a> или электронной почте <a href="mailto:support@bankro.tech">SUPPORT@BANKRO.TECH</a>.
                </p>
            </div>

			<br /><br />
			<a class="bn-download" href="/files/meetings_user_manual.pdf" target="_blank">
				<img src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>" alt="pdf icon">ЭС руководство пользователя
			</a>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>