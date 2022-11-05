<?
$arTariffs = array();
if (CModule::IncludeModule("iblock")) {
    $arFilter = Array("IBLOCK_ID" => IBLOCK_ID__CALC_SETTINGS, "GLOBAL_ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "UF_*");
    $rsSect = CIBlockSection::GetList(Array("SORT" => "ASC", "ID" => "ASC"), $arFilter, false, $arSelect);
    while ($ar_sect = $rsSect->GetNext()) {
        $arTariffs[$ar_sect['CODE']] = $ar_sect;
    }
}
?>

<div class="bn-wrapper">
    <div class="bn-calc__main wow fadeInUpShort" data-wow-duration="1s" data-wow-offset="200">
        <div class="bn-calc__top">
            <h2 class="bn-h2"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_TITLE")?></h2>

            <a href="javascript:void(0);" class="bn-btn bn-btn--br bn-btn--icon js-calc-pdf" style="display:none;">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor"><path d="M9.879 1.5H4.5C3.675 1.5 3 2.175 3 3V15C3 15.825 3.675 16.5 4.5 16.5H13.5C14.325 16.5 15 15.825 15 15V6.621C15 6.2235 14.8417 5.84175 14.5605 5.5605L10.9395 1.9395C10.6583 1.65825 10.2765 1.5 9.879 1.5ZM11.25 13.5H6.75C6.336 13.5 6 13.164 6 12.75C6 12.336 6.336 12 6.75 12H11.25C11.664 12 12 12.336 12 12.75C12 13.164 11.664 13.5 11.25 13.5ZM11.25 10.5H6.75C6.336 10.5 6 10.164 6 9.75C6 9.336 6.336 9 6.75 9H11.25C11.664 9 12 9.336 12 9.75C12 10.164 11.664 10.5 11.25 10.5ZM9.75 6.75V2.625L13.875 6.75H9.75Z"/></svg>
                <span><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_TITLE_BTN_TEXT")?></span>
            </a>
        </div>

        <form action="#" method="post" class="bn-calc__form">
            <div class="bn-calc__middle">
                <div class="bn-calc__colum">
                    <div class="bn-calc-box" data-group="1">
                        <div class="bn-checked bn-calc-box__btn" data-icon="bn-calc-automation">
                            <input type="checkbox" name="automation[product]" value="Y">
                            <span class="bn-checked__toggle"></span>
                            <span class="bn-checked__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_TITLE_1")?></span>
                            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/arrow-down--white.svg'?>" alt="arrow down" class="bn-calc-box__arrow">
                        </div>

                        <div class="bn-calc-box__show">
                            <div class="bn-calc-box__box">
                                <span class="bn-calc-box__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_DESC_1")?></span>

                                <label class="bn-checked-square">
                                    <input type="checkbox" name="automation[org]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="automation[org_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-automation-org-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_ORG']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-automation-org-year-price">0,00 р.</span></span>
                            </div>

                            <div class="bn-calc-box__box">
                                <label class="bn-checked-square">
                                    <input type="checkbox" name="automation[ind]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="automation[ind_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-automation-ind-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_AUTOMATION_TARIFFS_IND']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-automation-ind-year-price">0,00 р.</span></span>
                            </div>
                        </div>
                    </div>

                    <div class="bn-calc-box" data-group="2">
                        <div class="bn-checked bn-calc-box__btn" data-icon="bn-calc-monitoring">
                            <input type="checkbox" name="monitoring[product]" value="Y">
                            <span class="bn-checked__toggle"></span>
                            <span class="bn-checked__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_TITLE_2")?></span>
                            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/arrow-down--white.svg'?>" alt="arrow down" class="bn-calc-box__arrow">
                        </div>

                        <div class="bn-calc-box__show">
                            <div class="bn-calc-box__box">
                                <span class="bn-calc-box__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_DESC_2")?></span>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="monitoring[count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_MONITORING_TARIFFS']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-monitoring-price">0,00 р.</span></span>
                            </div>
                        </div>
                    </div>

                    <div class="bn-calc-box" data-group="3">
                        <div class="bn-checked bn-calc-box__btn" data-icon="bn-calc-electronic">
                            <input type="checkbox" name="meetings[product]" value="Y">
                            <span class="bn-checked__toggle"></span>
                            <span class="bn-checked__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_TITLE_3")?></span>
                            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/arrow-down--white.svg'?>" alt="arrow down" class="bn-calc-box__arrow">
                        </div>

                        <div class="bn-calc-box__show">
                            <div class="bn-calc-box__box">
                                <span class="bn-calc-box__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_DESC_3")?></span>

                                <label class="bn-checked-square">
                                    <input type="checkbox" name="meetings[org]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="meetings[org_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-meetings-org-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_MEETINGS_TARIFFS_ORG']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-meetings-org-year-price">0,00 р.</span></span>
                            </div>

                            <div class="bn-calc-box__box">
                                <label class="bn-checked-square">
                                    <input type="checkbox" name="meetings[ind]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="meetings[ind_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-meetings-ind-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_MEETINGS_TARIFFS_IND']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-meetings-ind-year-price">0,00 р.</span></span>
                            </div>
                        </div>
                    </div>

                    <div class="bn-calc-box" data-group="1">
                        <div class="bn-checked bn-calc-box__btn" data-icon="bn-calc-api">
                            <input type="checkbox" name="api[product]" value="Y">
                            <span class="bn-checked__toggle"></span>
                            <span class="bn-checked__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_TITLE_4")?></span>
                            <img src="<?=SITE_TEMPLATE_PATH.'/static/images/arrow-down--white.svg'?>" alt="arrow down" class="bn-calc-box__arrow">
                        </div>

                        <div class="bn-calc-box__show">
                            <div class="bn-calc-box__box">
                                <span class="bn-calc-box__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_BLOCK_DESC_4")?></span>

                                <label class="bn-checked-square">
                                    <input type="checkbox" name="api[org]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="api[org_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-api-org-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_API_TARIFFS_ORG']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-api-org-year-price">0,00 р.</span></span>
                            </div>

                            <div class="bn-calc-box__box">
                                <label class="bn-checked-square">
                                    <input type="checkbox" name="api[ind]" value="Y" checked>
                                    <span class="bn-checked-square__square"></span>
                                    <span class="bn-checked-square__text"><?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CHECKBOX_TEXT']?></span>
                                </label>

                                <div class="bn-calc-box__group">
                                    <span class="bn-calc-box__text--small"><?=$arTariffs['CALC_API_TARIFFS_IND']['UF_SLIDER_TITLE']?></span>
                                    <input type="number" name="api[ind_count]" class="bn-calc-box__number" min="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                           max="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">

                                    <div class="bn-range-slider">
                                        <input class="bn-range-slider__handler" type="range" min="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>"
                                               max="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>" value="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" step="1">
                                        <progress class="bn-range-slider__track" value="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MIN'] ?: 0?>" max="<?=$arTariffs['CALC_API_TARIFFS_IND']['UF_CALC_SLIDER_MAX'] ?: 0?>"></progress>

                                        <span class="bn-range-slider__text"><?=$arTariffs['CALC_API_TARIFFS_IND']['UF_SLIDER_MAX_TEXT']?></span>
                                    </div>
                                </div>

                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_API_TARIFFS_IND']['UF_TOTAL_TEXT_1']?> <span class="text--green js-calc-api-ind-quarter-price">0,00 р.</span></span>
                                <span class="bn-calc-box__price"><?=$arTariffs['CALC_API_TARIFFS_IND']['UF_TOTAL_TEXT_2']?> <span class="text--green js-calc-api-ind-year-price">0,00 р.</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bn-calc__grid">
                    <div class="bn-calc-img-check" data-calc="bn-calc-automation">
                        <img class="bn-calc-img-check__icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-product-auto.svg'?>" alt="icon product">
                    </div>
                    <div class="bn-calc-img-check" data-calc="bn-calc-monitoring">
                        <img class="bn-calc-img-check__icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-product-monitoring.svg'?>" alt="icon product">
                    </div>
                    <div class="bn-calc-img-check" data-calc="bn-calc-electronic">
                        <img class="bn-calc-img-check__icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-product-electro.svg'?>" alt="icon product">
                    </div>
                    <div class="bn-calc-img-check" data-calc="bn-calc-api">
                        <img class="bn-calc-img-check__icon" src="<?=SITE_TEMPLATE_PATH.'/static/images/hero-product-api.svg'?>" alt="icon product">
                    </div>
                </div>
            </div>

            <div class="bn-calc__bottom">
                <div class="bn-calc__text-group">
                    <span class="bn-calc__text"><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_TOTAL_TEXT")?> <u>0 продуктов</u></span>
                    <span class="bn-calc__price">0,00 р.</span>
                </div>

                <button type="button" class="bn-btn bn-btn--bg bn-btn--invoice" style="display:none;"><span><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_FOOTER_BTN_TEXT_2")?></span></button>
                <button type="button" class="bn-btn bn-btn--bg btn--question"><span><?=\Bitrix\Main\Config\Option::get( "askaron.settings", "UF_CALC_FOOTER_BTN_TEXT")?></span></button>
            </div>
        </form>

        <img src="<?=SITE_TEMPLATE_PATH.'/static/images/calc-elipse.svg'?>" alt="elipse" class="bn-calc__elipse wow fadeIn" data-wow-duration="2s" data-wow-delay="1s" data-wow-offset="300">
    </div>
</div>

<?//PR(CALC_MONITORING_TARIFF_MAX);?>