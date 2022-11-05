<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Регламент проведения комитета кредиторов");
?>

    <section class="bn-manual bn-min-h">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>

            <div class="bn-manual__main">
                <p class="bn-manual__text wow fadeInUpShort" data-wow-duration="1s">
                    Организация и проведение заседания комитета кредиторов проводится в соответствии с утвержденным регламентом. Чтобы упросить арбитражному управляющему задачу по организации электронного собрания, мы подготовили типовой регламент.
					<br/><br/>
					Скачать типовой регламент можно ниже.
                </p>
            </div>

			<br /><br />
			<a class="bn-download" href="/files/kk_model_regulation.docx" download>
				<img src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>" alt="pdf icon">Регламент проведения комитета кредиторов
			</a>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>