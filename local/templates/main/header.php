<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");

CJSCore::Init(array("fx"));
CModule::IncludeModule("iblock");

$curPage = $APPLICATION->GetCurPage();
$urlArr = explode("/", $curPage);
$GLOBALS["isMain"] = $isMain = ( $curPage == "/" )?true:false;
$GLOBALS["isDetail"] = $isDetail = ($urlArr[1] == "search" && isset($urlArr[2]) && isset($urlArr[3]));
$GLOBALS["page"] = $page = ( $urlArr[2] == null || $urlArr[2] == "" )?$urlArr[1]:$urlArr[2];
$subPage = $urlArr[2];
$GLOBALS["version"] = 4;

$GLOBALS["depends"] = array(
	"search" => array(
		"js" => array(
			SITE_TEMPLATE_PATH."/html/js/isotope.pkgd.min.js"
		)
	),
);
if($isDetail){
	//получить страну (раздел)
	$rsSections = CIBlockSection::GetList(
		array(),
		array('IBLOCK_ID'=>1, '=CODE'=>$_REQUEST["SECTION_CODE"]),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_HEADER_POPULAR','UF_HEADER_TIME','UF_HEADER_TV')
	);
	if($arSection = $rsSections->Fetch()){
		$GLOBALS["arCountry"] = array(
			'name' => $arSection['UF_COUNTRY_NAME'],
			'title' => $arSection['NAME'],
			'titleText' => $arSection['UF_HEADER_TEXT'],
			'visa' => $arSection['UF_HEADER_VISA'],
			'popular' => $arSection['UF_HEADER_POPULAR'],
			'bestTime' => $arSection['UF_HEADER_TIME'],
			'titleTV' => $arSection['UF_HEADER_TV']
		);
	}
	if($GLOBALS["arCountry"]["title"]){
		$APPLICATION->SetTitle($GLOBALS["arCountry"]["title"]);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>

	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
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

		<div class="b b-head <?if($isDetail) echo 'b-head-detail';?> <?if(!$isMain) echo 'b-head-inner'?>" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/head.jpg')">
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
				<?if(!$isDetail):?>
					<div class="b-head-content">
						<?if(!$isMain):?>
							 <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "header", Array(
								"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
								"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
								"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
							), false);?>
						<?endif;?>
						<h1><?=$APPLICATION->ShowProperty("header-title");?></h1>
						<p class="b-head-text"><?=$APPLICATION->ShowProperty("header-text");?></p>
						<?if($isMain):?>
							<div class="center">
								<a href="#" class="b-btn b-btn-orange">
									<p class="btn-bold">Рассчитать стоимость</p>
									<p class="btn-regular">вашего лучшего тура</p>
								</a>
							</div>
						<?endif;?>
					</div>
				<?else:?>
					<div class="b-head-content">
						<?
						$APPLICATION->AddChainItem($GLOBALS["arCountry"]["title"], $curPage);//добавить текущую страну в цепочку
						$APPLICATION->IncludeComponent("bitrix:breadcrumb", "header", Array(
							"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
							"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
							"START_FROM" => "0"	// Номер пункта, начиная с которого будет построена навигационная цепочка
						), false);?>
						<h1><?$APPLICATION->ShowTitle()?></h1>
						<p class="b-head-text"><?=$GLOBALS["arCountry"]["titleText"];?></p>
					</div>
					<div class="b-adv-list clearfix">
						<div class="b-adv-item">
							<p><b>Виза в страну:</b></p>
							<p><?=$GLOBALS["arCountry"]["visa"];?></p>
						</div>
						<div class="b-adv-item">
							<p><b>Популярные курорты:</b></p>
							<div>
								<?=$GLOBALS["arCountry"]["popular"];?>
							</div>
						</div>
						<div class="b-adv-item">
							<p><b>Лучшее время для отдыха:</b></p>
							<p><?=$GLOBALS["arCountry"]["bestTime"]?></p>
						</div>
					</div>
				<?endif;?>
			</div>
			<div class="b-head-gradient"></div>
			<div class="b-head-white"></div>
		</div>

		<div class="b b-content">