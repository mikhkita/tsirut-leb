<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/local/templates/".SITE_TEMPLATE_ID."/header.php");

CJSCore::Init(array("fx"));
CModule::IncludeModule("iblock");

$curPage = $APPLICATION->GetCurPage();
$urlArr = explode("/", $curPage);
$GLOBALS["isMain"] = $isMain = ( $curPage == "/" )?true:false;

//Детальная страны
$GLOBALS["isDetail"] = $isDetail = ($urlArr[1] == "search" && !empty($urlArr[2]));
//Детальная курорта/месяца/сезона в стране
$GLOBALS["isDetailResort"] = $isDetailResort = ($urlArr[1] == "search" && !empty($urlArr[2]) && !empty($urlArr[3]));
//Детальная месяца/сезона в курорте
$GLOBALS["isDetailResortMonth"] = $isDetailResortMonth = ($urlArr[1] == "search" && !empty($urlArr[2]) && !empty($urlArr[3]) && !empty($urlArr[4]));

$GLOBALS["page"] = $page = ( $urlArr[2] == null || $urlArr[2] == "" )?$urlArr[1]:$urlArr[2];
$subPage = $urlArr[2];
$GLOBALS["version"] = 9;

$GLOBALS["hotDir"] = "hot-tours";
if( $urlArr[1] == $GLOBALS["hotDir"] && isset($urlArr[3]) )
	$page = $GLOBALS["page"] = $GLOBALS["hotDir"];

if( $urlArr[1] == $GLOBALS["hotDir"] && isset($urlArr[4]) )
	$page = $GLOBALS["page"] = "hot-detail";

$GLOBALS["pagesList"] = array("search","hot-tours","russia","contacts","articles","about");

$GLOBALS["depends"] = array(
	"search" => array(
		"js" => array(
			SITE_TEMPLATE_PATH."/html/js/isotope.pkgd.min.js"
		)
	),
	"contacts" => array(
		"js" => array(
			"https://api-maps.yandex.ru/2.1.41/?load=package.full&amp;lang=ru-RU&onload=yandexMapInit"
		)
	)
);

if($isDetail){
	//получить страну (раздел)
	$GLOBALS["arCountry"] = getCountrySection($_REQUEST["SECTION_CODE"]);
	if(!empty($GLOBALS["arCountry"])){
		//установить заголовок
		if($GLOBALS["arCountry"]["title"]){
			$APPLICATION->SetTitle($GLOBALS["arCountry"]["title"]);
		}
		//изображение в хедере
		$headImg = $GLOBALS["arCountry"]["headImg"];
	}else{
		CHTTP::SetStatus('404 Not found');
		defined('ERROR_404') or define('ERROR_404', 'Y');
	}

	$curMonth = date("n");
	$curYear = date("Y");
	$prevYear = (int)$curYear - 1;
	$nextYear = (int)$curYear + 1;
	$GLOBALS["monthsTV"] = array(
		UF_MONTH_1 => array("start" => "01.01.".(($curMonth <= 1) ? $curYear : $nextYear), "end" => "31.01.".(($curMonth <= 1) ? $curYear : $nextYear), "name" => "январь"),
		UF_MONTH_2 => array("start" => "01.02.".(($curMonth <= 2) ? $curYear : $nextYear), "end" => "29.02.".(($curMonth <= 2) ? $curYear : $nextYear), "name" => "февраль"),
		UF_MONTH_3 => array("start" => "01.03.".(($curMonth <= 3) ? $curYear : $nextYear), "end" => "31.03.".(($curMonth <= 3) ? $curYear : $nextYear), "name" => "март"),
		UF_MONTH_4 => array("start" => "01.04.".(($curMonth <= 4) ? $curYear : $nextYear), "end" => "30.04.".(($curMonth <= 4) ? $curYear : $nextYear), "name" => "апрель"),
		UF_MONTH_5 => array("start" => "01.05.".(($curMonth <= 5) ? $curYear : $nextYear), "end" => "31.05.".(($curMonth <= 5) ? $curYear : $nextYear), "name" => "май"),
		UF_MONTH_6 => array("start" => "01.06.".(($curMonth <= 6) ? $curYear : $nextYear), "end" => "30.06.".(($curMonth <= 6) ? $curYear : $nextYear), "name" => "июнь"),
		UF_MONTH_7 => array("start" => "01.07.".(($curMonth <= 7) ? $curYear : $nextYear), "end" => "31.07.".(($curMonth <= 7) ? $curYear : $nextYear), "name" => "июль"),
		UF_MONTH_8 => array("start" => "01.08.".(($curMonth <= 8) ? $curYear : $nextYear), "end" => "31.08.".(($curMonth <= 8) ? $curYear : $nextYear), "name" => "август"),
		UF_MONTH_9 => array("start" => "01.09.".(($curMonth <= 9) ? $curYear : $nextYear), "end" => "30.09.".(($curMonth <= 9) ? $curYear : $nextYear), "name" => "сентябрь"),
		UF_MONTH_10 => array("start" => "01.10.".(($curMonth <= 10) ? $curYear : $nextYear), "end" => "31.10.".(($curMonth <= 10) ? $curYear : $nextYear), "name" => "октябрь"),
		UF_MONTH_11 => array("start" => "01.11.".(($curMonth <= 11) ? $curYear : $nextYear), "end" => "30.11.".(($curMonth <= 11) ? $curYear : $nextYear), "name" => "ноябрь"),
		UF_MONTH_12 => array("start" => "01.12.".(($curMonth <= 12) ? $curYear : $nextYear), "end" => "31.12.".(($curMonth <= 12) ? $curYear : $nextYear), "name" => "декабрь"),
	);
	$GLOBALS["seasonsTV"] = array(
		UF_SEASON_SUMMER => array("start" => "01.06.".(($curMonth < 9) ? $curYear : $nextYear), "end" => "31.08.".(($curMonth < 9) ? $curYear : $nextYear), "img" => "tours-summer.svg", "name" => "лето", "nameEnd" => "летом"),//лето
		UF_SEASON_AUTUNM => array("start" => "01.09.".(($curMonth < 12) ? $curYear : $nextYear), "end" => "30.11.".(($curMonth < 12) ? $curYear : $nextYear), "img" => "tours-autumn.svg", "name" => "осень", "nameEnd" => "осенью"),//осень
		UF_SEASON_WINTER => array("start" => "01.12.".(($curMonth < 3) ? $prevYear : $curYear), "end" => "29.02.".(($curMonth < 3) ? $curYear : $nextYear), "img" => "tours-winter.svg", "name" => "зима", "nameEnd" => "зимой"),//зима
		UF_SEASON_SPRING => array("start" => "01.03.".(($curMonth < 6) ? $curYear : $nextYear), "end" => "31.05.".(($curMonth < 6) ? $curYear : $nextYear), "img" => "tours-spring.svg", "name" => "весна", "nameEnd" => "весной"),//весна
	);
}

if($isDetailResort){
	//получить курорт/месяц/сезон у страны (раздел)
	$GLOBALS["arResort"] = getCountrySection($GLOBALS["arCountry"]["id"], $_REQUEST["RESORT"]);
	if(!empty($GLOBALS["arResort"])){
		//установить заголовок
		if($GLOBALS["arResort"]["month"]){
			$APPLICATION->SetTitle($GLOBALS["arCountry"]["title"]." на ".$GLOBALS["monthsTV"][$GLOBALS["arResort"]["month"]]["name"]);
		}elseif($GLOBALS["arResort"]["season"]){
			$APPLICATION->SetTitle($GLOBALS["arCountry"]["title"]." ".$GLOBALS["seasonsTV"][$GLOBALS["arResort"]["season"]]["nameEnd"]);
		}elseif($GLOBALS["arResort"]["title"]){
			$APPLICATION->SetTitle($GLOBALS["arResort"]["title"]);
		}
		$headImg = $GLOBALS["arResort"]["headImg"];
	}else{
		CHTTP::SetStatus('404 Not found');
		defined('ERROR_404') or define('ERROR_404', 'Y');
	}
}

if($isDetailResortMonth){
	//получить месяц/сезон у курорта (раздел)
	$GLOBALS["arMonth"] = getCountrySection($GLOBALS["arResort"]["id"], $_REQUEST["MONTH"]);
	if(!empty($GLOBALS["arMonth"])){
		//установить заголовок
		if($GLOBALS["arResort"]["title"] && $GLOBALS["arMonth"]["month"]){
			$APPLICATION->SetTitle($GLOBALS["arResort"]["title"]." на ".$GLOBALS["monthsTV"][$GLOBALS["arMonth"]["month"]]["name"]);
		}elseif($GLOBALS["arResort"]["title"] && $GLOBALS["arMonth"]["season"]){
			$APPLICATION->SetTitle($GLOBALS["arResort"]["title"]." ".$GLOBALS["seasonsTV"][$GLOBALS["arMonth"]["season"]]["nameEnd"]);
		}elseif($GLOBALS["arResort"]["title"]){
			$APPLICATION->SetTitle($GLOBALS["arResort"]["title"]);
		}
		$headImg = $GLOBALS["arMonth"]["headImg"];
	}else{
		CHTTP::SetStatus('404 Not found');
		defined('ERROR_404') or define('ERROR_404', 'Y');
	}
}

$hotCodes = $GLOBALS["hotCodes"] =  array(
	"moscow" => array(
		"ID" => CITY_MOSCOW,
		"NAME" => "из Москвы",
		"TOURVISOR_ID" => 1,
		"CODE" => "tomsk",
	),
	"belgorod" => array(
		"ID" => CITY_BELGOROD,
		"NAME" => "из Белгорода",
		"TOURVISOR_ID" => 32,
		"CODE" => "belgorod",
	),
	"voronezh" => array(
		"ID" => CITY_VORONEZH,
		"NAME" => "из Воронежа",
		"TOURVISOR_ID" => 26,
		"CODE" => "voronezh",
	),
);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/KitAnimate.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/slick.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/chosen.min.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout.css?<?=$GLOBALS["version"]?>" type="text/css">

	<?$APPLICATION->ShowHead();?>

	<link rel="stylesheet" media="screen and (min-width: 768px) and (max-width: 1328px)" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout-tablet.css?<?=$GLOBALS["version"]?>">
	<link rel="stylesheet" media="screen and (min-width: 240px) and (max-width: 767px)" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout-mobile.css?<?=$GLOBALS["version"]?>">

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="aquamarin"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/html/favicon/mstile-144x144.png" />

	<script src="https://vk.com/js/api/openapi.js?160" type="text/javascript"></script>

</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div id="panel-menu" class="panel-menu slideout-menu">
		<h2>Меню</h2>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "mobile-menu", Array(
			"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
			"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
				0 => "",
			),
			"MAX_LEVEL" => "2",	// Уровень вложенности меню
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		),false);?>
	</div>

	<div id="panel-page" class="slideout-panel">
		<div class="b-menu clearfix">
			<div class="b-block">
				<a href="/" class="b-menu-logo"></a>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
					"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
						0 => "",
					),
					"MAX_LEVEL" => "2",	// Уровень вложенности меню
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				),false);?>
			</div>
		</div>

		<?if($isDetail && isset($headImg['src'])){
			$headImgSrc = $headImg['src'];
		}else{
			$headImgSrc = SITE_TEMPLATE_PATH.'/html/i/head.jpg';
		}?>
		<div 
			class="b b-head <?if($isDetail) echo 'b-head-detail';?> <?if(!$isMain) echo 'b-head-inner'?>" 
			style="background-image: url('<?=$headImgSrc?>')"
		>
			<div class="b-block">
				<div class="b-head-top clearfix">
					<a href="/" class="b-logo"></a>
					<div class="b-head-feedback">
						<a href="tel:<?=includeArea("phone", true)?>" class="b-head-phone"><?=includeArea("phone")?></a><br>
						<a href="#b-popup-call" class="dashed fancy">Заказать звонок</a>
					</div>
					<div class="b-menu-mobile-cont">
						<div class="b-menu-mobile">
							<span class="b-menu-button icon-menu"></span>
							<p>Меню</p>
						</div>
						<div class="b-head-feedback-mobile">
							<a href="tel:<?=includeArea("phone", true)?>" class="b-head-phone"><?=includeArea("phone")?></a><br>
							<a href="#b-popup-call" class="dashed fancy">Заказать звонок</a>
						</div>
					</div>
				</div>

				<?if($isDetail):?>
					<?if($isDetail && !$isDetailResort && !$isDetailResortMonth){
						$targetSect = $GLOBALS["arCountry"];
					}elseif($isDetail && $isDetailResort && !$isDetailResortMonth){
						$targetSect = $GLOBALS["arResort"];
					}elseif($isDetail && $isDetailResortMonth){
						$targetSect = $GLOBALS["arMonth"];
					}
					?>
					<div class="b-head-content">
						<?
						if($isDetail && !$isDetailResort && !$isDetailResortMonth){
							//добавить текущую страну в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arCountry"]["title"], $curPage);
						}elseif($isDetail && $isDetailResort && !$isDetailResortMonth){
							//добавить текущую страну в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arCountry"]["title"], "/search/".$GLOBALS["arCountry"]["code"]."/");
							//добавить текущий курорт в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arResort"]["title"], $curPage);
						}elseif($isDetail && $isDetailResortMonth){
							//добавить текущую страну в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arCountry"]["title"], "/search/".$GLOBALS["arCountry"]["code"]."/");
							//добавить текущий курорт в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arResort"]["title"], "/search/".$GLOBALS["arCountry"]["code"]."/".$GLOBALS["arResort"]["code"]."/");
							//добавить месяц/сезон в цепочку
							$APPLICATION->AddChainItem($GLOBALS["arMonth"]["title"], $curPage);
						}
						$APPLICATION->IncludeComponent("bitrix:breadcrumb", "header", Array(
							"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
							"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
							"START_FROM" => "0"	// Номер пункта, начиная с которого будет построена навигационная цепочка
						), false);
						?>
						<h1><?$APPLICATION->ShowTitle()?></h1>
						<p class="b-head-text"><?=$targetSect["titleText"];?></p>
					</div>
					<div class="b-adv-list clearfix">	
						<?if($targetSect["visa"]):?>
						<div class="b-adv-item">
							<p><b>Виза в страну:</b></p>
							<p><?=$targetSect["visa"];?></p>
						</div>
						<?endif;?>
					
						<?if($targetSect["resortList"]):?>
						<div class="b-adv-item">
							<p><b>Популярные курорты:</b></p>
							<div>
							<?
								$arResortList = array();
								foreach ($targetSect["resortList"] as $value){
									$arResortList[] = "<a href='".$value['url']."/'>".$value["name"]."</a>";
								}
								echo implode(", ", $arResortList);
							?>
							</div>
						</div>
						<?endif;?>
						<?if($targetSect["bestTime"]):?>
						<div class="b-adv-item">
							<p><b>Лучшее время для отдыха:</b></p>
							<p><?=$targetSect["bestTime"]?></p>
						</div>
						<?endif;?>
					</div>
				<?else:?>
					<div class="b-head-content">
						<?if(!$isMain):?>
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "header", Array(
								"PATH" => "",
								"SITE_ID" => "s1",
								"START_FROM" => "0",
							), false);?>
						<?endif;?>
						<?
						if(!empty($APPLICATION->GetProperty("header-title"))){
							$title = $APPLICATION->GetProperty("header-title");
							echo $APPLICATION->SetTitle($title);
						}
						?>
						<h1><?$APPLICATION->ShowTitle()?></h1>

						<?if($APPLICATION->GetProperty("header-text") != "-"):?>
							<p class="b-head-text"><?=$APPLICATION->ShowProperty("header-text");?></p>
						<?endif;?>
					</div>
				<?endif;?>
			</div>
			<div class="b-head-gradient"></div>
			<div class="b-head-white"></div>
		</div>

		<div class="b b-content <?if($isMain) echo 'b-content-main'?>">
			<?if(!in_array($urlArr[1], $GLOBALS["pagesList"]) && !$GLOBALS["isMain"]):?>
				<div class="b-content-back b-contacts-top">
					<div class="b-block">
						<div class="b-text">
			<?endif;?>