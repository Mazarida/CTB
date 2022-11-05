<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

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
<script>
    jQuery(function($){
        if (typeof window.initScroll === "undefined") {
            $(window).scroll(function(){
                console.log("scrolls");
                if ($('.slider-products__iframe').length == 0 && $('.slider-products__video-src').length > 0) {
                    if ($(document).scrollTop() + $(window).height()*3 > $('.slider-products__video-src').offset().top) {
                        window.vidsInit = true;
                        $('.slider-products__video-src').each(function() {
                            let uri = $(this).attr("data-src");
                            $(this).after($('<iframe class="slider-products__iframe" width="100%" height="100%" src="'+uri+'" frameborder="0" allowfullscreen></iframe>'))
                        });
                    }
                }
            });
            $(window).scroll();
            window.initScroll = true
        }
    });
</script>
<div class="swiper-wrapper">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="swiper-slide slider-products__box">
            <div class="slider-products__colum">
                <div class="slider-products__group">
                    <?if ($arItem['DISPLAY_PROPERTIES']['MAIN_PAGE_PICTURE']['FILE_VALUE']['ID']):?>
                        <img src="<?=$arItem['DISPLAY_PROPERTIES']['MAIN_PAGE_PICTURE']['FILE_VALUE']['SRC']?>" alt="slide image" class="slider-products__img">
                    <?endif;?>

                    <?
                    $video_link = '';
                    if ($arItem['DISPLAY_PROPERTIES']['SCREENCAST']['~VALUE']) {
                        $link = $arItem['DISPLAY_PROPERTIES']['SCREENCAST']['~VALUE'];

                        $arr = explode('v=', $link);
                        if (isset($arr[1])) {
                            $video_link = 'https://www.youtube.com/embed/'.$arr[1].'?autoplay=1&mute=1&controls=0&loop=1&rel=0&showinfo=0&modestbranding=1&playlist='.$arr[1];
                        } else {
                            $arr = array_reverse(explode('/', $link));
                            if ($arr[1] = 'embed' && $arr[0]) {
                                $video_link = 'https://www.youtube.com/embed/'.$arr[0].'?autoplay=1&mute=1&controls=0&loop=1&rel=0&showinfo=0&modestbranding=1&playlist='.$arr[0];
                            }
                        }
                    }

                    ?>
                    <div class="slider-products__video-src" data-src="<?=$video_link?>"></div>
                </div>

                <?if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                    <div class="slider-products__icon">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
                    </div>
                <?endif;?>
            </div>
            <div class="slider-products__colum">
                <?if ($arItem['DISPLAY_PROPERTIES']['MAIN_PAGE_TITLE']['DISPLAY_VALUE']):?>
                    <h2 class="bn-h2"><?=$arItem['DISPLAY_PROPERTIES']['MAIN_PAGE_TITLE']['~VALUE']?></h2>
                <?endif;?>

                <?if ($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <p class="slider-products__text"><?=$arItem["PREVIEW_TEXT"];?></p>
                <?endif;?>

                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-btn-text bn-btn-text--green"><?=Loc::getMessage('MORE_TEXT')?></a>
            </div>
        </div>
    <?endforeach;?>
</div>

<?//PR($arResult);?>
