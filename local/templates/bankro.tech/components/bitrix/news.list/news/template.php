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
$number = 1;
?>

<?if ($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>

<?foreach ($arResult['ITEMS'] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

    <?if ($number == 1 || $number == 4):?>
        <div class="<?=$number == 1 ? 'bn-tile-large' : 'bn-tile'?>">
    <?endif;?>

    <?if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
        <?if ($number < 4) :?>
            <a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-tile-large__box bn-tile-large__box--<?=$number == 1 ? 'large' : 'small'?> wow fadeInUpShort" data-wow-duration="1s">
                <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                    <span class="bn-tile-large__title"><?=$arItem["NAME"]?></span>
                <?endif;?>

                <?if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <span class="bn-tile-large__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
                <?endif;?>

                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="bn-tile-large__image">
            </a>
        <?else:?>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bn-tile__box wow fadeInUpShort" data-wow-duration="1s">
                <div class="bn-tile__image">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
                </div>

                <?if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
                    <span class="bn-tile__title"><?=$arItem["NAME"]?></span>
                <?endif;?>

                <?if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <span class="bn-tile__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
                <?endif;?>
            </a>
        <?endif;?>
    <?endif;?>

    <?if ($number == 3):?>
        </div>
    <?endif;?>
    <?$number++;?>
<?endforeach;?>

<?if (count($arResult['ITEMS'])):?>
    </div>
<?endif;?>

<?if ($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>

