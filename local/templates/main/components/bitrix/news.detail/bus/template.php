<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="b-bus-tours-left">
	<div class="b-bus-tours-filter">
		<h3>Фильтр туров</h3>
		<form method="GET" action="/tours/bus/" class="b-bus-filter-form">
			<ul>
			<?
			$ids = array();
			if(isset($_REQUEST["loc"]) && !empty($_REQUEST["loc"])){
				foreach ($_REQUEST["loc"] as $id => $value) {
					$ids[] = $id;
				}
			}
			$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC", "VALUE"=>"ASC"), Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "CODE"=>"LOCATION_FILTER"));
			?>
			<?while($enum_fields = $property_enums->GetNext()):?>
				<li class="b-checkbox">
					<input id="bus-city-<?=$enum_fields["ID"]?>" type="checkbox" name="loc[<?=$enum_fields["ID"]?>]" <?if(in_array($enum_fields["ID"], $ids)) echo "checked"?>>
					<label for="bus-city-<?=$enum_fields["ID"]?>">
						<div class="b-checked icon-checked"></div>
						<p><?=$enum_fields["VALUE"]?></p>
					</label>
				</li>
			<?endwhile;?>
			</ul>
			<div class="center">
				<a href="#" class="b-btn b-btn-rect bus-filter-submit bus-filter-detail-submit">Найти туры</a><br>
			</div>
		</form>
	</div>
	<div class="b-tourvisor-nav">
		<div class="b-tourvisor-nav-item clearfix">
			<h3>Популярные направления</h3>
			 <?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"country-list-articles",
				Array(
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COUNT_ELEMENTS" => "Y",
					"FILTER_NAME" => "sectionsFilter",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "content",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array("PICTURE",""),
					"SECTION_ID" => "1",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("UF_COUNTRY_NAME",""),
					"SHOW_PARENT_NAME" => "Y",
					"TOP_DEPTH" => "2",
					"VIEW_MODE" => "LINE"
				)
			);?>
		</div>
		<div class="b-tourvisor-nav-item">
			<h3>Наши преимущества</h3>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-cards.svg">
				<p><?=includeArea("filter-adv-1")?></p>
			</div>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-earth.svg">
				<p><?=includeArea("filter-adv-2")?></p>
			</div>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-money.svg">
				<p><?=includeArea("filter-adv-3")?></p>
			</div>
		</div>
	</div>
</div>
<div class="b-bus-tours-right b-bus-tours-list">
	<div class="b-bus-detail">
		<!-- <div class="b-content-back"> -->
			<div class="b-block">
				<div class="b-constructor">
					<?=$arResult["DETAIL_TEXT"];?>
				</div>
			</div>
		<!-- </div> -->
	</div>
</div>
