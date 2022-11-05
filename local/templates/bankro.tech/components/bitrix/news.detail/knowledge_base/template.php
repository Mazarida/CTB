<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);
?>

<?if (!empty($arResult["FIELDS"]["TAGS"])):?>
    <div class="bn-hashtag">
        <?
        $arTag = explode(', ', $arResult["FIELDS"]["TAGS"]);
        foreach ($arTag as $tag):?>
            <span class="bn-hashtag__item" style="margin-right:10px;">#<?=mb_ucfirst($tag)?></span>
        <?endforeach;?>
    </div>
<?endif;?>

    <div class="bn-article__columns">
        <div class="bn-article__content">
            <?if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]):?>
                <h2 class="bn-h2"><?=$arResult["NAME"]?></h2>
            <?endif;?>

            <div class="bn-video-box">
                <?if ($arResult['DISPLAY_PROPERTIES']['VIDEO_FILE']['FILE_VALUE']['SRC']):?>
                    <video class="bn-video" src="<?=$arResult['DISPLAY_PROPERTIES']['VIDEO_FILE']['FILE_VALUE']['SRC']?>" <?if (is_array($arResult["DETAIL_PICTURE"])) echo 'poster="'.$arResult["DETAIL_PICTURE"]['SRC'].'"';?>></video>

                    <div class="bn-video__overlay" style="background:none;">
                        <div class="bn-video-footage__btn-video">
                            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                        </div>
                    </div>
                <?endif;?>
            </div>

            <?if ($arResult["DETAIL_TEXT"] <> ''):?>
                <p class="bn-article__text"><?=$arResult["DETAIL_TEXT"]?></p>
            <?endif;?>
        </div>

        <?if (isset($arResult['_SECTION']['ITEMS']) && is_array($arResult['_SECTION']['ITEMS'])):?>
            <div class="bn-article__playlist">
                <div class="bn-playlist-title-block">
                    <div class="bn-playlist-title">Плейлист:</div>
                    <div class="bn-playlist-subtitle"><?=$arResult['_SECTION']['NAME']?></div>
                </div>

                <div class="bn-playlist-items-block">
                    <table class="bn-playlist-item">
                        <?foreach ($arResult['_SECTION']['ITEMS'] as $item):?>
                            <tr <?if ($item['CURRENT_ACTIVE'] == 'Y') echo 'class="bn-playlist-item-active"'?>>
                                <td class="bn-playlist-item-number"><?=$item['NUMBER']?></td>
                                <td class="bn-playlist-item-img">
                                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="bn-video-footage__box">
                                        <div class="bn-video-footage__img-box">
                                            <img class="bn-video-footage__img" src="<?=$item['PREVIEW_PICTURE_SRC']?>" alt="<?=$item['NAME']?>">

                                            <div class="bn-video-footage__btn-video">
                                                <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="bn-playlist-item-title">
                                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="bn-playlist-item-link"><?=$item['NAME']?></a>
                                </td>
                            </tr>
                        <?endforeach;?>
                    </table>
                </div>
            </div>
        <?endif?>
    </div>

<?//PR($arResult);?>