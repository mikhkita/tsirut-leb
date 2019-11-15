<div class="b-block">
	<div class="b-block-ttv">
		 <script type="text/javascript" src="https://www.tourtrans.ru/js/online-styles/new/modules.js" charset="uft-8"></script>
		<div class="ttv-search" data-catalog-url="/tours/excursions/results.php">
		</div>
		<div class="ttv-hottours" data-catalog-url="/tours/excursions/results.php">
		</div>
	</div>
</div>
<div class="b b-popular-excursions">
	<div class="b-block">
		<h2 class="b-title">Самые популярные направления</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"country-list-min",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_SHOW" => 16,
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"PICTURE",1=>"",),
		"SECTION_ID" => "1",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("UF_PRICE_FROM","UF_COUNTRY_NAME",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?>
	</div>
</div>