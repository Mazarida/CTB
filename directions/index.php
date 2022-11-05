<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

LocalRedirect(SITE_DIR);

$APPLICATION->SetTitle("Направления");
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>