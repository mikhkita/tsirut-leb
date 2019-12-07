<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$GLOBALS['APPLICATION']->RestartBuffer();

// $parser = new Parser();
// $parser->test();
// die();

// Получаем направление, которое дольше всех не обновлялось
$arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_SECTION_ID", "PROPERTY_*");
$arFilter = array("IBLOCK_ID" => 7, "ACTIVE_DATE" => "Y");
$res = CIBlockElement::GetList(array("DATE_ACTIVE_FROM" => "ASC"), $arFilter, false, array("nPageSize" => 1), $arSelect);

$ob = $res->GetNextElement();
$arItem = $ob->GetFields();
$arItem["PROPS"] = $ob->GetProperties();

$parser = new Parser();
$country = $arItem["PROPS"]["COUNTRY_ID"]["VALUE"];
// $departure = array_pop(explode("-", $arItem["PROPS"]["CITY"]["VALUE_XML_ID"]));

$rsSect = CIBlockSection::GetList(
	array('sort' => 'asc'),
	array(
	   'IBLOCK_ID' => 7,
	   'ID' => $arItem["IBLOCK_SECTION_ID"]
	),
	false,
	array('IBLOCK_ID','ID','NAME','CODE')
);
if ($arSect = $rsSect->GetNext()){
	$departure = $GLOBALS["hotCodes"][$arSect["CODE"]]["TOURVISOR_ID"];
}

$resort = $arItem["PROPS"]["RESORT_ID"]["VALUE"];

if( $arItem["PROPS"]["RESORT_ID"]["VALUE"] ){
	$result = $parser->parse($country, $departure, $resort);
}else{
	$result = $parser->parse($country, $departure);
}

print_r($result);

$minPrice = 999999;
$i = 0;
foreach ($result["MIN_PRICE"] as $key => $date) {
	if( $i == 0 ) $minPrice = $date["MP"];
    echo $date["DT"]." на ".(intval($date["NT"])+1)." дней/".$date["NT"]." ночей <b>".$date["MP"]."</b> руб (".$date["DP"]." руб в день)<br>";
    $i++;
}
echo "<br>";
foreach ($result["DAY_PRICE"] as $key => $date) {
    echo $date["DT"]." на ".(intval($date["NT"])+1)." дней/".$date["NT"]." ночей <b>".$date["MP"]."</b> руб (".$date["DP"]." руб в день)<br>";
}

$arr = explode("-", file_get_contents($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/id.txt"));
$prevID = intval($arr[0]);
$count = intval($arr[1]);
$countCur = 1;
$writeDate = (count($result["MIN_PRICE"]))?true:false;
if( !$writeDate && $prevID == $arItem["ID"] ){
	if( $count >= 3 ){
		Log::debug("Три раза ничего не получил");
		$writeDate = true;
	}
	$countCur = $count + 1;
}

file_put_contents($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/id.txt", $arItem["ID"]."-".$countCur);

if( $writeDate ){
	if( count($result["MIN_PRICE"]) ){
		CIBlockElement::SetPropertyValues($arItem["ID"], $arItem["IBLOCK_ID"], $minPrice, "MIN_PRICE");
	}

	// Записываем дату парсинга
	$el = new CIBlockElement;
	$res = $el->Update($arItem["ID"], array(
		"DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "FULL"),
		"DETAIL_TEXT" => json_encode($result["DAY_PRICE"]),
		"PREVIEW_TEXT" => json_encode($result["MIN_PRICE"]),
		"ACTIVE" => (count($result["MIN_PRICE"]))?"Y":"N",
	));
}

die();
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>