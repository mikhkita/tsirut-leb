<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Горящие туры ".$GLOBALS["hotCodes"][$_REQUEST["CITY"]]["NAME"]);
?>

<div class="b-block">
	<?$APPLICATION->AddChainItem($hotCodes[$_REQUEST["CITY"]]["NAME"], "/".$GLOBALS["hotDir"]."/".$_REQUEST['CITY']."/");?>
	<div class="b-city-tabs b-hot-city-tabs">
		<? foreach ($hotCodes as $key => $city): ?>
			<a href="/<?=$GLOBALS["hotDir"]?>/<?=$key?>/<?if($page == "hot-detail"):?><?=$_REQUEST['ELEMENT_CODE']?>/<?endif;?>" class="b-city-tab<?if($key == $_REQUEST["CITY"]):?> active<?endif;?>"><?=$city["NAME"]?></a>
		<? endforeach; ?>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
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
		"ELEMENT_CODE" => $_REQUEST["CITY"]."-".$_REQUEST["ELEMENT_CODE"],
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
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
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "hot",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
<div class="b b-feedback">
	<div class="b-feedback-back">
	</div>
	<div class="b-block">
		<div class="b-feedback-text">
			<h2><?=includeArea("hot-detail-form-head");?></h2>
			<div class="div-p"><?=includeArea("hot-detail-form-text");?></div>
			<form class="b-feedback-form" method="post" action="/searchTour.php">
 <input type="text" name="name" placeholder="Ваше имя" required="">
 <input type="text" name="phone" placeholder="Ваш телефон" required="">
 <input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
 <a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
				 <a href="#" class="b-btn b-btn-orange ajax">
					<p class="btn-bold">
						 Подберите мне тур
					</p>
					<p class="btn-regular">
						 Хочу довериться профессионалам
					</p>
				 </a>
				<div class="b-checkbox">
 <input id="personal-1" type="checkbox" name="personal" checked="" required=""> <label for="personal-1">
					<div class="b-checked icon-checked">
					</div>
					<p>
						 Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a>
					</p>
 </label>
				</div>
				<input type="submit" value="Отправить" style="display:none;">
			</form>
		</div>
		<div class="b-5-manager">
			<div class="b-5-name">
				<div class="div-p">
					 <?=includeArea("b-5-name");?>
				</div>
				 <small><?=includeArea("b-5-post");?></small>
			</div>
		</div>
	</div>
</div>

<div class="b-block">
	<div class="b-seo-separator-wide">
	</div>
</div>
<div class="b-seo b-block">
	<div class="seo-block center">
		<h2 class="with-icon"><span class="seo-icon seo-icon-coin"></span>Заголовок блока</h2>
		<p>
			Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации соответствующий условий активизации. Товарищи! укрепление и развитие структуры требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. 
		</p>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>