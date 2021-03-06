

<div class="b-block">
	<?$APPLICATION->AddChainItem($hotCodes[$_REQUEST["CITY"]]["NAME"], "/".$GLOBALS["hotDir"]."/".$_REQUEST['CITY']."/");?>
	<div class="b-city-tabs b-hot-city-tabs">
		<? foreach ($hotCodes as $key => $city): ?>
			<?
			//Проверить есть ли активные туры в этом городе
			$arFilter = Array(
				"IBLOCK_ID"=>7,
				"CODE"=>$_REQUEST['ELEMENT_CODE'],
				"ACTIVE"=>"Y",
				"SECTION_ID"=>$city["ID"]
			);
			$count = CIBlockElement::GetList(Array(), $arFilter, Array(), false, Array());
			?>
			<?if($count > 0):?>
				<a href="/<?=$GLOBALS["hotDir"]?>/<?=$key?>/<?if($page == "hot-detail"):?><?=$_REQUEST['ELEMENT_CODE']?>/<?endif;?>" class="b-city-tab<?if($key == $_REQUEST["CITY"]):?> active<?endif;?>"><?=$city["NAME"]?></a>
			<?endif;?>
		<? endforeach; ?>
	</div>
</div>
<?
//Получить ID тура по симв.коду и городу вылета
// $arSelect = Array("ID", "NAME");
$arFilter = Array(
	"IBLOCK_ID"=>7, 
	"ACTIVE"=>"Y", 
	"CODE"=>$_REQUEST["ELEMENT_CODE"], 
	"SECTION_ID"=>$GLOBALS["hotCodes"][$_REQUEST["CITY"]]["ID"]
);

$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), array());
if($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$GLOBALS['PLACEHOLDERS'] = $arFields;

	foreach ($arProps as $key => $value) {
		$GLOBALS['PLACEHOLDERS'][$key] = $value['VALUE'];
	}

	// vardump($GLOBALS['PLACEHOLDERS']);

	$APPLICATION->IncludeComponent(
		"bitrix:news.detail", 
		"hot", 
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_ELEMENT_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BROWSER_TITLE" => "SEO_TITLE",
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_CODE" => "",
			"ELEMENT_ID" => $arFields["ID"],
			"FIELD_CODE" => array(
				0 => "ID",
				1 => "CODE",
				2 => "NAME",
				3 => "PREVIEW_TEXT",
				4 => "DETAIL_TEXT",
				5 => "",
			),
			"IBLOCK_ID" => "7",
			"IBLOCK_TYPE" => "content",
			"IBLOCK_URL" => "",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "SEO_DESCRIPTION",
			"META_KEYWORDS" => "-",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Страница",
			"PROPERTY_CODE" => array(
				0 => "PODBOR",
				1 => "SLIDER_1",
				2 => "SLIDER_2",
				3 => "SLIDER_3",
				4 => "",
			),
			"SET_BROWSER_TITLE" => "Y",
			"SET_CANONICAL_URL" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"USE_PERMISSIONS" => "N",
			"USE_SHARE" => "N",
			"COMPONENT_TEMPLATE" => "hot",
			"STRICT_SECTION_CHECK" => "N"
		),
		false
	);
}
?>
