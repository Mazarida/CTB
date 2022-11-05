<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

unlink($_SERVER["DOCUMENT_ROOT"] . '/' . $_REQUEST['filename']);

echo $_REQUEST['filename'];

die();