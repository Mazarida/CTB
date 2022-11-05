<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Контакты");
?>

    <section class="bn-contact bn-min-h">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s"><?$APPLICATION->ShowTitle(false);?></h2>

            <div class="bn-contact__main">
                <div class="bn-contact__colum">
                    <div class="bn-contact__box wow fadeInUpShort" data-wow-duration="1s">
                        <span class="bn-contact__title">Телефон</span>
                        <?$APPLICATION->IncludeFile(SITE_DIR."/include/phone_contacts_page.php", Array(), Array("MODE" => "html"));?>
                    </div>
                    <button type="button" class="bn-btn bn-btn--bg bn-btn--icon btn--contact-us wow fadeInUpShort" data-wow-duration="1s">
                        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/mail-icon--black.svg'?>" alt="mail icon">
                        <span>Связаться с нами</span>
                    </button>
                </div>
                <div class="bn-contact__colum">
                    <div class="bn-contact__box wow fadeInUpShort" data-wow-duration="1s">
                        <span class="bn-contact__title">Тех.поддержка</span>
                        <?$APPLICATION->IncludeFile(SITE_DIR."/include/email_technical_support.php", Array(), Array("MODE" => "html"));?>
                    </div>
                    <div class="bn-contact__box mt-6 wow fadeInUpShort" data-wow-duration="1s">
                        <span class="bn-contact__title">Для соискателей</span>
                        <?$APPLICATION->IncludeFile(SITE_DIR."/include/email_job_seekers.php", Array(), Array("MODE" => "html"));?>
                    </div>
                </div>
				<div class="bn-contact__colum">
                    <div class="bn-contact__box wow fadeInUpShort" data-wow-duration="1s">
                        <span class="bn-contact__title">Мы в соц. сетях</span>
                        <?$APPLICATION->IncludeFile(SITE_DIR."/include/socials.php", Array(), Array("MODE" => "html"));?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>