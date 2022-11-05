<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if (!empty($arResult)):?>
    <ul class="bn-nav-list">
        <?
        foreach ($arResult as $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>

            <li class="bn-nav-list__item"><a href="<?=$arItem["LINK"]?>" class="bn-nav-list__link bn-underline"><?=$arItem["TEXT"]?></a></li>
        <?endforeach;?>
    </ul>
<?endif;?>