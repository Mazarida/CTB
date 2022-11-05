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

<? /* foreach($arResult["_ITEMS"] as $id => $sect):?>
    <section class="bn-product-base-video bn-knowledge-base-video">
        <div class="bn-wrapper">
            <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
                <span class="text--green"><?=$arResult['_SECTIONS'][$id]?></span>
            </h2>
            <div class="bn-video-footage">
                <?if ($arParams["DISPLAY_TOP_PAGER"]):?>
                    <?=$arResult["NAV_STRING"]?>
                <?endif;?>

                <?foreach($sect as $key => $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-video-footage__box wow fadeInUpShort" data-wow-duration="1s">
                        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                            <div class="bn-video-footage__img-box">
                                <img class="bn-video-footage__img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">

                                <div class="bn-video-footage-overlay">
                                    <div class="bn-video-footage-text">999 видео</div>
                                    <div class="bn-video-footage__btn-video">
                                        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?endif;?>

                        <?if($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                            <span class="bn-video-footage__title"><?=$arItem["NAME"]?></span>
                            <div class="bn-video-footage__subtitle">Описание плейлиста</div>
                        <?endif;?>
                    </a>
                <?endforeach;?>

                <?if ($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                    <?=$arResult["NAV_STRING"]?>
                <?endif;?>
            </div>
        </div>
    </section>
<?endforeach; */?>

<section class="bn-product-base-video bn-knowledge-base-video">
    <div class="bn-wrapper">
        <h2 class="bn-h2 wow fadeInUpShort" data-wow-duration="1s">
            <span class="text--green">Видеоматериалы</span>
        </h2>
        <div class="bn-video-footage">
            <?if ($arParams["DISPLAY_TOP_PAGER"]):?>
                <?=$arResult["NAV_STRING"]?>
            <?endif;?>

            <?foreach($arResult["_SECTIONS"] as $id => $sect):?>
                <?foreach($sect['ITEMS'] as $key => $arItem):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-video-footage__box wow fadeInUpShort" data-wow-duration="1s">
                        <div class="bn-video-footage__img-box">
                            <img class="bn-video-footage__img" src="<?=$arItem["PREVIEW_PICTURE"]?>" alt="<?=$sect["NAME"]?>">

                            <div class="bn-video-footage-overlay">
                                <div class="bn-video-footage-text"><?=count($arResult["_SECTIONS"][$id]["ITEMS"])?> видео</div>
                                <div class="bn-video-footage__btn-video">
                                    <img src="<?=SITE_TEMPLATE_PATH.'/static/images/play-icon--white.svg'?>" alt="">
                                </div>
                            </div>
                        </div>

                        <span class="bn-video-footage__title"><?=$sect["NAME"]?></span>
                        <div class="bn-video-footage__subtitle"><?=$sect["DESCRIPTION"]?></div>
                    </a>
                    <?break;?>
                <?endforeach;?>
            <?endforeach;?>

            <?if ($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                <?=$arResult["NAV_STRING"]?>
            <?endif;?>
        </div>
    </div>
</section>
