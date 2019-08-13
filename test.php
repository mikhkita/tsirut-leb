<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

$minPrices = $tourvisor->getMinPrices(982592);
echo "<pre>";

$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 1), false, array("ID", "UF_COUNTRY_NAME"));
$countries = array();
while($arSection = $rsSections->Fetch()){
	if( !empty($arSection["UF_COUNTRY_NAME"]) ){
		$countries[ mb_strtolower($arSection["UF_COUNTRY_NAME"], "UTF-8") ] = $arSection["ID"];
	}
}

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
	// var_dump($value);
	// die();

	if( isset($countries[$name]) ){
		$obSec = new CIBlockSection();
		$boolResult = $obSec->Update($countries[$name], array(
			"UF_PRICE_FROM" => $value["price"],
			"UF_CITY_ID_TV" => $departures[ $value["departure"] ]
		));
		// var_dump($countries[$name]);
		// var_dump($boolResult);
		// die();
	}

	
	// echo $value["departure"]." ".$value["country"]." ".$value["price"]."<br>";
}

var_dump($countries);

// var_dump($minPrices["data"]["minprice"]);
echo "</pre>";

?>


<div class="tv-min-price tv-moduleid-982592"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>