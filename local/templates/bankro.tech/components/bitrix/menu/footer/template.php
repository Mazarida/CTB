<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if (!empty($arResult)):?>
    <div class="bn-footer__colum">
        <ul class="bn-footer-menu">
            <?
            foreach ($arResult as $key => $arItem):?>
                <?
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>

                <li class="bn-footer-menu__item"><a href="<?=$arItem["LINK"]?>" class="bn-footer__link bn-underline"><?=$arItem["TEXT"]?></a></li>
            <?endforeach;?>
        </ul>
    </div>
<?endif;?>
