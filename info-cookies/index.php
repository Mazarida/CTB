<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Конфиденциальность");
?>

    <section class="bn-manual bn-min-h">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>

            <div class="bn-manual__main">
                <h3>Заявление о соблюдении конфиденциальности на сайте ООО «Центр технологий банкротства»</h3>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    ООО «Центр технологий банкротства» уделяет большое внимание защите конфиденциальности личных данных пользователей, которые могут потребоваться нам для предоставления некоторых услуг. Данное заявление разъясняет, каким образом осуществляется сбор и использование данных, которые сообщаются посетителями сайта.
                </p>
                <br/><br/>

                <h3>Сбор личных сведений</h3>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    Мы ставим посетителей сайта в известность, если нам потребуется получить информацию, которая позволяет установить их личность или их контактные данные. Эти данные запрашиваются при обращении посредством форм обратной связи для оказания консультаций по продуктам Компании.
                </p>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    На сайте ООО «Центр технологий банкротства» осуществляется сбор некоторых сведений об используемом компьютерном оборудовании и программном обеспечении. Информация такого рода может включать в себя IP-адрес пользователя, тип обозревателя, количество предыдущих посещений и адрес сайта, с которого пользователь осуществил переход на наш сайт. Данная информация используется для повышения качества предоставляемых услуг, а также для подготовки обобщенных статистических данных, характеризующих использование сайта.
                </p>
                <br/><br/>

                <h3>Обеспечение безопасности личных сведений</h3>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    ООО «Центр технологий банкротства» уделяет большое внимание обеспечению безопасности личных данных пользователей. Мы применяем технологии и процедуры, помогающие защитить личные сведения от несанкционированного доступа, использования и разглашения.
                </p>
                <br/><br/>

                <h3>Использование файлов «cookie»</h3>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    Файлы «cookie» используются для сбора сведений о том, какие ссылки на сайте выбираются посетителями. Эти сведения помогают определять, какая информация представляет для них наибольший интерес. Сбор этих данных осуществляется в обобщенном виде и никогда не соотносится с личными сведениями пользователей.
                </p>
                <br/>
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    Пользователь может отключить в обозревателе прием файлов «cookie» с сайта ООО «Центр технологий банкротства», при этом он сможет просматривать текст на веб-страницах, однако возможности индивидуальной настройки на службы сайта будут недоступны.
                </p>
                <br/><br/>
            </div>

			<a class="bn-download" href="/files/privacy_policy.pdf" target="_blank">
				<img src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>" alt="pdf icon">Политика обработки персональных данных
			</a>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>