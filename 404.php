<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404. Страница не найдена");
?>

<div class="b-404-content b-text">
	<div class="b-block">
		<p>Страницы, которую Вы запрашиваете, не существует.<br>Возможно она была удалена или Вы неправильно ввели адрес.</p>
		<br>
		<h2>Карта сайта: </h2>
		<?
		$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
			"LEVEL"	=>	"3",
			"COL_NUM"	=>	"2",
			"SHOW_DESCRIPTION"	=>	"Y",
			"SET_TITLE"	=>	"N",
			"CACHE_TIME"	=>	"3600"
			)
		);
		?>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>