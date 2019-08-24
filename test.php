<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

// die();

$minPrices = $tourvisor->getMinPrices(982592);
echo "<pre>";

$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 1), false, array("ID", "UF_COUNTRY_NAME"));
$countries = array();
while($arSection = $rsSections->Fetch()){
	if( !empty($arSection["UF_COUNTRY_NAME"]) ){
		$countries[ mb_strtolower($arSection["UF_COUNTRY_NAME"], "UTF-8") ] = array(
			"ID" => $arSection["ID"],
		);
	}
}

$countriesTV = $tourvisor->getCountries(982592);

echo "<pre>";
// var_dump($countriesTV);
foreach ($countriesTV["items"] as $key => $value) {
	$name = mb_strtolower($value["name"], "UTF-8");
	$air = $value["weather"][0]["temp_air"];
	$water = $value["weather"][0]["temp_water"];
	
	if( isset($countries[$name]) ){
		if( $air != "" ){
			$countries[$name]["AIR"] = $air;
		}
		if( $water != "" ){
			$countries[$name]["WATER"] = $water;
		}
	}
}
echo "</pre>";


// грузия
// бали
// нидерланды
// крым
// анапа
// геленджик
// санкт-петербург


$departures = array(
	"Белгорода" => 32,
	"Москвы" => 1,
);
foreach ($minPrices["data"]["minprice"] as $key => $value) {
	$name = mb_strtolower($value["country"], "UTF-8");

	if( isset($countries[$name]) ){
		$countries[$name]["PRICE"] = $value["price"];
		$countries[$name]["DEPARTURE"] = $departures[ $value["departure"] ];
	}
}

foreach ($countries as $key => $country) {
	$obSec = new CIBlockSection();
	var_dump(array(
		"UF_PRICE_FROM" => $country["PRICE"],
		"UF_CITY_ID_TV" => $country["DEPARTURE"],
		"UF_T_WATER_1" => $country["WATER"],
		"UF_T_AIR_1" => $country["AIR"],
	));
	$boolResult = $obSec->Update($country["ID"], array(
		"UF_PRICE_FROM" => $country["PRICE"],
		"UF_CITY_ID_TV" => $country["DEPARTURE"],
		"UF_T_WATER_1" => $country["WATER"],
		"UF_T_AIR_1" => $country["AIR"],
	));
}

// var_dump($countries);

// var_dump($minPrices["data"]["minprice"]);
echo "</pre>";

?>


<div class="tv-min-price tv-moduleid-982592"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>