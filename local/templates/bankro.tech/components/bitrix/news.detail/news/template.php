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

$video_link = '';
if ($arResult['DISPLAY_PROPERTIES']['VIDEO_LINK']['~VALUE']) {
	$link = $arResult['DISPLAY_PROPERTIES']['VIDEO_LINK']['~VALUE'];

	$arr = explode('v=', $link);
	if (isset($arr[1])) {
		$video_link = 'https://www.youtube.com/embed/'.$arr[1];
	} else {
		$arr = array_reverse(explode('/', $link));
		if ($arr[1] = 'embed' && $arr[0]) {
			$video_link = 'https://www.youtube.com/embed/'.$arr[0];
		}
	}
}

global $dir;
$page_url = '/news/';
if (strpos($dir, '/library/') !== false) {
    $page_url = '/library/';
}
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
                                $(this).after($('<iframe class="slider-products__iframe" width="100%" height="100%" src="'+uri+'" frameborder="0" allowfullscreen style="pointer-events: auto;"></iframe>'))
                            });
                        }
                    }
                });
                $(window).scroll();
                window.initScroll = true
            }
        });
    </script>


<?if (!empty($arResult["FIELDS"]["TAGS"])):?>
    <div class="bn-hashtag">
        <?
        $arTag = explode(', ', $arResult["FIELDS"]["TAGS"]);
        foreach ($arTag as $tag):?>
            <a href="<?=$page_url?>?tag=<?=$tag?>" class="bn-hashtag__item" style="margin-right:10px;color:#0C1E34;">#<?=mb_ucfirst($tag)?></a>
        <?endforeach;?>
    </div>
<?endif;?>

    <div class="bn-article__content">
        <?if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]):?>
            <h2 class="bn-h2"><?=$arResult["NAME"]?></h2>
        <?endif;?>

        <?if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
            <p class="bn-article__text"><i><?=$arResult["FIELDS"]["PREVIEW_TEXT"]?></i></p>
            <hr class="bn-hr"/>
        <?endif;?>

        <?if ($arResult["DETAIL_TEXT"] <> ''):?>
            <div><?=$arResult["DETAIL_TEXT"]?></div>
        <?endif?>
    </div>

<?if ($video_link):?>
<div class="slider-products__group" style="border: 0;border-radius: 0;margin-top: 20px;">

	<?if ($arResult["DETAIL_PICTURE"]["SRC"]):?>
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="slide image" class="slider-products__img">
	<?endif;?>

		<div class="slider-products__video-src" data-src="<?=$video_link?>" style="pointer-events: auto;"></div>
</div>
<?endif?>

<?if ($arResult['DISPLAY_PROPERTIES']['DOWNLOAD_FILE']['FILE_VALUE']['SRC']):?>
    <a class="bn-download" href="<?=$arResult['DISPLAY_PROPERTIES']['DOWNLOAD_FILE']['FILE_VALUE']['SRC']?>"
       download="<?=$arResult['DISPLAY_PROPERTIES']['DOWNLOAD_FILE']['FILE_VALUE']['ORIGINAL_NAME']?>">
        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/document-icon--green.svg'?>" alt="pdf icon"><?=$arResult['DISPLAY_PROPERTIES']['DOWNLOAD_FILE']['FILE_VALUE']['ORIGINAL_NAME']?>
    </a>
<?endif;?>

<? // $APPLICATION->IncludeFile(SITE_DIR."/include/news/about_lot_card.php", Array(), Array("MODE" => "html"));?>

<?//PR($arResult);?>