<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

$minPrices = $tourvisor->getMinPrices(982592);
echo "<pre>";

foreach ($minPrices["data"]["minprice"] as $key => $value) {
	echo $value["departure"]." ".$value["country"]." ".$value["price"]."<br>";
}



// var_dump($minPrices["data"]["minprice"]);
echo "</pre>";

?>


<div class="tv-min-price tv-moduleid-982592"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>