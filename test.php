<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

$minPrices = $tourvisor->getMinPrices(982592);
echo "<pre>";

$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 1), false, array("ID", "UF_COUNTRY_NAME"));
$countries = array();
while($arSection = $rsSections->Fetch()){
	if( !empty($arSection["UF_COUNTRY_NAME"]) ){
		$countries[ mb_strtolower($arSection["UF_COUNTRY_NAME"], "UTF-8") ] = array(
			"ID" => $arSection["ID"]
		);
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

	if( isset($countries[ $name ]) ){
		$countries[ $name ]["PRICE"] = $value["price"];
		$countries[ $name ]["DEPARTURE"] = $departures[ $value["departure"] ];
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