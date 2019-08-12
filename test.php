<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$tourvisor = new Tourvisor();

var_dump($tourvisor->getMinPrices());

?>


<!-- <div class="tv-min-price tv-moduleid-982592"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script> -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>