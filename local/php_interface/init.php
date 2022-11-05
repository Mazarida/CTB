<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/constants.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/constants.php");
}

if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/functions.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php");
}

//if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/handlers.php")) {
//    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/handlers.php");
//}

function custom_mail ($to, $subject, $message, $additionalHeaders = '')
{

	require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/PHPMailer.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/SMTP.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

  try {
    $mail->IsSMTP();
    $mail->SMTPAuth      = true;
    $mail->SMTPKeepAlive = true;
    $mail->SMTPDebug = 0;
	$mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.yandex.ru';
	//$mail->Port = 25; //465; // 587
	$mail->Port = 465; // 587
    $mail->Username = 'bankro-test';
    $mail->Password = 'a48d1347f';
    $mail->CharSet =  'UTF-8'; // 'Windows-1251'
  
	$mail->SetFrom('bankro-test@yandex.ru');//$mail->Username);
    $mail->AddAddress(trim($to));
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
 
    $bRet = $mail->Send();
 
    $mail->ClearAddresses();
    $mail->ClearAttachments();
 
    return $bRet;
 
  } catch (Exception $e) {
    die('Message could not be sent. Mailer Error: '. $mail->ErrorInfo);
  }
}