<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

$countries = $tourvisor->getCountries(982990);

echo "<pre>";
foreach ($countries["items"] as $key => $value) {
	var_dump($value["weather"]);
}
echo "</pre>";


die();

// $minPrices = $tourvisor->getMinPrices(982990);
// echo "<pre>";

// $rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 1), false, array("ID", "UF_COUNTRY_NAME"));
// $countries = array();
// while($arSection = $rsSections->Fetch()){
// 	if( !empty($arSection["UF_COUNTRY_NAME"]) ){
// 		$countries[ mb_strtolower($arSection["UF_COUNTRY_NAME"], "UTF-8") ] = $arSection["ID"];
// 	}
// }

// // грузия
// // бали
// // нидерланды
// // крым
// // анапа
// // геленджик
// // санкт-петербург


// $departures = array(
// 	"Белгорода" => 32,
// 	"Москвы" => 1,
// );
// foreach ($minPrices["data"]["minprice"] as $key => $value) {
// 	$name = mb_strtolower($value["country"], "UTF-8");

// 	if( isset($countries[$name]) ){
// 		$obSec = new CIBlockSection();
// 		$boolResult = $obSec->Update($countries[$name], array(
// 			"UF_PRICE_FROM" => $value["price"],
// 			"UF_CITY_ID_TV" => $departures[ $value["departure"] ]
// 		));
// 	}
// }

// var_dump($countries);

// // var_dump($minPrices["data"]["minprice"]);
// echo "</pre>";

?>


<div class="tv-min-price tv-moduleid-982990"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>