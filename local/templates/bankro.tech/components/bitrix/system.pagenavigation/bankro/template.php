<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
        return;
    }
}
?>

<ul class="bn-pagination wow fadeIn" data-wow-duration="2s">
    <?
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
    $bFirst = true;
    ?>

    <?if ($arResult["NavPageNomer"] > 1):?>
        <li class="bn-pagination__arrow">
            <?if ($arResult["bSavePage"]):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
            <?else:?>
                <?if ($arResult["NavPageNomer"] > 2):?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
                <?else:?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_prev")?></a>
                <?endif;?>
            <?endif;?>
        </li>

        <?if ($arResult["nStartPage"] > 1):?>
            <?$bFirst = false;?>
            <li class="bn-pagination__item">
                <?if ($arResult["bSavePage"]):?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
                <?else:?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                <?endif;?>
            </li>

            <?if ($arResult["nStartPage"] > 2):?>
                <li class="bn-pagination__triplet">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
                </li>
            <?endif;?>
        <?endif;?>
    <?endif;?>

    <?do {?>
        <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
            <li class="bn-pagination__item active">
                <span><?=$arResult["nStartPage"]?></span>
            </li>
        <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
            <li class="bn-pagination__item">
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
            </li>
        <?else:?>
            <li class="bn-pagination__item">
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
            </li>
        <?endif;
        $arResult["nStartPage"]++;
        $bFirst = false;?>
    <?} while($arResult["nStartPage"] <= $arResult["nEndPage"]); ?>

    <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
        if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
            if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):?>
                <li class="bn-pagination__triplet">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a>
                </li>
            <?endif;?>

            <li class="bn-pagination__item">
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
            </li>
        <?endif;?>

        <li class="bn-pagination__arrow">
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_next")?></a>
        </li>
    <?endif;?>
</ul>