<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
    <?=bitrix_sessid_post()?>

    <?
    if (!empty($arResult["ERROR_MESSAGE"])) {
        echo '<div style="padding-bottom: 15px;">';
        foreach ($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
        echo '</div>';
    }
    ?>

    <?if (strlen($arResult["OK_MESSAGE"]) > 0):?>
        <div class="mf-ok-text text--green" style="padding-bottom: 15px;"><?=$arResult["OK_MESSAGE"]?></div>
    <?endif;?>

    <div class="bn-form__grid">
        <div class="bn-form__colum">
            <input type="text" class="bn-input" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=Loc::getMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>*<?endif;?>" />
			<input type="text" class="bn-input" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="<?=Loc::getMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>*<?endif;?>" />
            <input type="text" class="bn-input" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder="<?=Loc::getMessage("MFT_PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?>*<?endif;?>" />
        </div>

        <div class="bn-form__colum">
            <textarea class="bn-textarea" name="MESSAGE" placeholder="<?=Loc::getMessage("MFT_QUESTION")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?>*<?endif;?>"><?=$arResult["MESSAGE"]?></textarea>
        </div>
    </div>

    <?if ($arParams["USE_CAPTCHA"] == "Y"):?>
        <div class="mf-captcha">
            <div class="mf-text"><?=Loc::getMessage("MFT_CAPTCHA")?></div>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
            <input type="text" class="bn-input" name="captcha_word" size="30" maxlength="50" value="" placeholder="<?=Loc::getMessage("MFT_CAPTCHA_CODE")?>*">
        </div>
    <?endif;?>

    <button type="submit" class="bn-btn bn-btn--bg" name="submit" value="<?=Loc::getMessage("MFT_SUBMIT")?>"><span class="bn-btn__text"><?=Loc::getMessage("MFT_SUBMIT")?></span></button>

    <label class="bn-checked-square">
        <input type="checkbox" name="AGREEMENT" value="Y" <?if ('Y' === $arResult["AGREEMENT"]) echo 'checked'?>>
        <span class="bn-checked-square__square"></span>
        <span class="bn-checked-square__text">Я <a href="/files/user_agreement.docx" download="user_agreement.docx">согласен</a> с <a href="/files/privacy_policy.pdf" target="_blank">Политикой обработки персональных данных</a></span>
    </label>

    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
</form>

<?//PR($arResult);?>
