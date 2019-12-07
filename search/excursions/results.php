<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("header-text", "Онлайн поиск и бронирование автобусных туров в Европу. <br>Экскурсионные туры в Прагу, Вену, Париж, Амстердам,<br> Рим, Будапешт.");
$APPLICATION->SetPageProperty("header-title", "Экскурсионные туры по Европе");
$APPLICATION->SetTitle("Экскурсионные туры по Европе");

?>

<div class="b-block">
	<div class="b-block-ttv">
		<link href="https://www.tourtrans.ru/js/online-styles/new/modules.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="https://www.tourtrans.ru/js/online-styles/new/modules.js" charset="uft-8"></script>
		<div class="ttv-catalog" data-email="rom4es.test@gmail.com"></div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>