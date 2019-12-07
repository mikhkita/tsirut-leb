<?

CModule::AddAutoloadClasses(
   '', // не указываем имя модуля
   array(
      // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
   	'Curl' => '/local/php_interface/classes/curl.php',
   	'Parser' => '/local/php_interface/classes/parser.php',
   	'Tourvisor' => '/local/php_interface/classes/tourvisor.php',
   	'TourList' => '/local/php_interface/classes/tourlist.php',
   	'Log' => '/local/php_interface/classes/log.php',
   )
);

// Константы

// define(WITHOUT_VISA, 2);//Без визы
// define(VISA, 3);//Виза
// define(VISA_ARRIVAL, 4);//Виза по прилете
// define(SCHENGEN_VISA, 5);//Шенгенская виза

define(UF_CATEGORIES, 3);//Польз. поле "Категории"
//Города из инфоблока "Горячие туры"
define(CITY_MOSCOW, 8);
define(CITY_BELGOROD, 9);
define(CITY_VORONEZH, 10);
//Резделы из инфоблока "Горячие туры"
define(CITY_MOSCOW_SECTION, 4372);
define(CITY_BELGOROD_SECTION, 4373);
define(CITY_VORONEZH_SECTION, 4374);
//Месяцы
define(UF_MONTH_1, 10);
define(UF_MONTH_2, 11);
define(UF_MONTH_3, 12);
define(UF_MONTH_4, 13);
define(UF_MONTH_5, 14);
define(UF_MONTH_6, 15);
define(UF_MONTH_7, 16);
define(UF_MONTH_8, 17);
define(UF_MONTH_9, 18);
define(UF_MONTH_10, 19);
define(UF_MONTH_11, 20);
define(UF_MONTH_12, 21);
//Сезоны
define(UF_SEASON_SUMMER, 22);
define(UF_SEASON_AUTUNM, 23);
define(UF_SEASON_WINTER, 24);
define(UF_SEASON_SPRING, 25);
// ===========

function includeArea($file, $getString = false){
	if($getString){
		$str = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/include/".$file.".php");
		return preg_replace("/[^\+0-9]/", "", $str);
	}else{
		global $APPLICATION;
		$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
		        "AREA_FILE_SHOW" => "file", 
		        "PATH" => "/include/".$file.".php"
		    )
		);
	}	
}

function numberFormat($value){
	return number_format($value, 0, '', ' ');
}

function UserFieldValue($id){
	$UserField = CUserFieldEnum::GetList(array(), array("ID" => $id));
	if($UserFieldAr = $UserField->GetNext()){
		return $UserFieldAr["VALUE"];
	}
	else return false;
}

function getRusMonth($i){
   $array = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
   return $array[$i-1];
}

function dateFormatted($date){
   $arr = explode("-", $date);
   return intval($arr[2])." ".getRusMonth($arr[1]);
}

function getCurrentDate(){
	$date = date("d-m-Y");
	$arr = explode("-", $date);
	return intval($arr[0])." ".getRusMonth($arr[1])." ".intval($arr[2]);
}

AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if (defined('ERROR_404') && ERROR_404=='Y' && !defined('ADMIN_SECTION')){
	   GLOBAL $APPLICATION;
	   $APPLICATION->RestartBuffer();
	   include   $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php';
	   require   ($_SERVER['DOCUMENT_ROOT'].'/404.php');
	   include   $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/footer.php';
	}
}

AddEventHandler("main", "OnEndBufferContent", "replacePlaceholders");
function replacePlaceholders(&$content){

	GLOBAL $APPLICATION;
	$curPage = $APPLICATION->GetCurPage();
	$urlArr = explode("/", $curPage);

	if (!in_array('admin', $urlArr)) {
		$year1 = date("Y", strtotime("+1 month"));
		$year2 = date("Y", strtotime("+2 month"));
		$year3 = date("Y", strtotime("+3 month"));
		$year4 = date("Y", strtotime("+4 month"));
		$year5 = date("Y", strtotime("+5 month"));
		$year6 = date("Y", strtotime("+6 month"));
		$year7 = date("Y", strtotime("+7 month"));
		$year8 = date("Y", strtotime("+8 month"));
		$year9 = date("Y", strtotime("+9 month"));
		$year10 = date("Y", strtotime("+10 month"));
		$year11 = date("Y", strtotime("+11 month"));

		$year = date("Y");
		$content = str_replace("#YEAR12#", $year, $content);
		
		if ($year != $year4) {
			$year = $year.'-'.$year4;
		}

		$content = str_replace("#YEAR#", $year, $content);
		$content = str_replace("#YEAR11#", $year1, $content);
		$content = str_replace("#YEAR10#", $year2, $content);
		$content = str_replace("#YEAR9#", $year3, $content);
		$content = str_replace("#YEAR8#", $year4, $content);
		$content = str_replace("#YEAR7#", $year5, $content);
		$content = str_replace("#YEAR6#", $year6, $content);
		$content = str_replace("#YEAR5#", $year7, $content);
		$content = str_replace("#YEAR4#", $year8, $content);
		$content = str_replace("#YEAR3#", $year9, $content);
		$content = str_replace("#YEAR2#", $year10, $content);
		$content = str_replace("#YEAR1#", $year11, $content);
	}
}

function writeLog($record, $filename){
	if(file_exists($filename)){
		file_put_contents($filename, PHP_EOL.date('d.m.Y-H:i:s').PHP_EOL.$record, FILE_APPEND);
	}else{
		file_put_contents($filename, date('d.m.Y-H:i:s').PHP_EOL.$record);
	}
}

//Получить инфу о разделе в стране
function getCountrySection($parentSection, $curSection = false){
	if(empty($parentSection)){
		return false;
	}
	//CModule::IncludeModule('iblock');
	$arCountrySect = array();
	if($curSection){//вложенный в страну раздел
		//$arFilter = array('IBLOCK_ID'=>1, '=CODE'=>$curSection, "=SECTION_ID"=>$parentSection);
		$rsParentSection = CIBlockSection::GetByID($parentSection);
		if ($arParentSection = $rsParentSection->GetNext()){
		   $arFilter = array('IBLOCK_ID' => $arParentSection['IBLOCK_ID'],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL'], '=CODE'=>$curSection); // выберет потомков без учета активности
		}else{
			return false;
		}
	}else{
		$arFilter = array('IBLOCK_ID'=>1, '=CODE'=>$parentSection);
	}
	$rsSections = CIBlockSection::GetList(
		array('depth_level' => 'asc'),
		$arFilter,
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','DESCRIPTION','DETAIL_PICTURE','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_COUNTRY_ID_TV','UF_RESORT_ID_TV','UF_CITY_ID_TV','UF_MONTH','UF_SEASON', "UF_COUNTY_NAME_V", "UF_COUNTY_NAME_R", "UF_EDITOR", "UF_FLYDATES_START", "UF_FLYDATES_END")
	);
	if($arSection = $rsSections->Fetch()){
		//print_r($arSection);
		//Получить месяцы, сезоны и курорты
		$monthList = array();
		$seasonList = array();
		$resortList = array();

		$rsSectMonth = CIBlockSection::GetList(
			array('sort' => 'asc'),
			array(
			   'IBLOCK_ID' => $arSection['IBLOCK_ID'],
			   '>LEFT_MARGIN' => $arSection['LEFT_MARGIN'],
			   '<RIGHT_MARGIN' => $arSection['RIGHT_MARGIN'],
			   '=DEPTH_LEVEL' => (int)$arSection['DEPTH_LEVEL'] + 2,
			   '!UF_MONTH' => false
			),
			false,
			array('IBLOCK_ID','ID','NAME','CODE','UF_MONTH')
		);

		while ($arSectMonth = $rsSectMonth->GetNext()){
			$monthList[] = $arSectMonth;
		}
		//Получить сезоны у этой страны
		$rsSectSeason = CIBlockSection::GetList(
			array('sort' => 'asc'),
			array(
			   'IBLOCK_ID' => $arSection['IBLOCK_ID'],
			   '>LEFT_MARGIN' => $arSection['LEFT_MARGIN'],
			   '<RIGHT_MARGIN' => $arSection['RIGHT_MARGIN'],
			   '=DEPTH_LEVEL' => (int)$arSection['DEPTH_LEVEL'] + 2,
			   '!UF_SEASON' => false
			),
			false,
			array('IBLOCK_ID','ID','NAME','CODE','UF_SEASON')
		);
		
		while ($arSectSeason = $rsSectSeason->GetNext()){
			$seasonList[] = $arSectSeason;
		}
		//Получить курорты у этой страны
		$rsSectResort = CIBlockSection::GetList(
			array('sort' => 'asc'),
			array(
			   'IBLOCK_ID' => $arSection['IBLOCK_ID'],
			   '>LEFT_MARGIN' => $arSection['LEFT_MARGIN'],
			   '<RIGHT_MARGIN' => $arSection['RIGHT_MARGIN'],
			   '=DEPTH_LEVEL' => (int)$arSection['DEPTH_LEVEL'] + 2,
			   '!UF_RESORT_ID_TV' => false
			),
			false,
			array('IBLOCK_ID','ID','NAME','CODE')
		);
		
		while ($arSectResort = $rsSectResort->GetNext()){
			$resortList[] = $arSectResort;
		}

		$arCountrySect = array(
			'id' => $arSection['ID'],
			'code' => $arSection['CODE'],
			'name' => $arSection['UF_COUNTRY_NAME'],
			'picture' => $arSection['DETAIL_PICTURE'],
			'isRussia' => ((int)$arSection['IBLOCK_SECTION_ID'] == 2),
			'seoText' => $arSection['DESCRIPTION'],
			'title' => $arSection['NAME'],
			'titleText' => $arSection['UF_HEADER_TEXT'],
			'visa' => $arSection['UF_HEADER_VISA'],
			'popular' => $arSection['UF_POPULAR_RESORT'],
			'bestTime' => $arSection['UF_HEADER_TIME'],
			'titleTV' => $arSection['UF_HEADER_TV'],
			'countryIDTV' => $arSection['UF_COUNTRY_ID_TV'],
			'resortIDTV' => $arSection['UF_RESORT_ID_TV'],
			'cityIDTV' => $arSection['UF_CITY_ID_TV'],
			'month' => $arSection['UF_MONTH'],
			'season' => $arSection['UF_SEASON'],
			'headImg' => CFile::ResizeImageGet($arSection["DETAIL_PICTURE"], Array("width" => 1920, "height" => 682), BX_RESIZE_IMAGE_EXACT, false, false, false, 70 ),
			'monthList' => array(),
			'seasonList' => array(),
			'resortList' => array(),
			'name_v' => $arSection['UF_COUNTY_NAME_V'],
			'name_r' => $arSection['UF_COUNTY_NAME_R'],
			'flydates_start' => $arSection['UF_FLYDATES_START'],
			'flydates_end' => $arSection['UF_FLYDATES_END'],
		);
		$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues($arSection['IBLOCK_ID'],$arSection['ID']);
		$IPROPERTY  = $ipropValues->getValues();
		if(!empty($IPROPERTY)){
			$arCountrySect['seoTitle'] = $IPROPERTY['SECTION_META_TITLE'];
			$arCountrySect['seoKeywords'] = $IPROPERTY['SECTION_META_KEYWORDS'];
			$arCountrySect['seoDesc'] = $IPROPERTY['SECTION_META_DESCRIPTION'];
			$arCountrySect['seoPageTitle'] = $IPROPERTY['SECTION_PAGE_TITLE'];
		}

		foreach ($monthList as $value) {
			$arCountrySect["monthList"][$value["UF_MONTH"]] = array(
				"name" => $value["NAME"],
				"code" => $value["CODE"],
			);
		}
		foreach ($seasonList as $value) {
			$arCountrySect["seasonList"][$value["UF_SEASON"]] = array(
				"name" => $value["NAME"],
				"code" => $value["CODE"],
			);
		}
		foreach ($resortList as $value) {
			$arCountrySect["resortList"][] = array(
				'name' => $value["NAME"],
				'url' => $value["CODE"],
			);
		}
	}
	return $arCountrySect;
}

function ShowCondBrowser(){
	global $APPLICATION;
	return $APPLICATION->GetTitle();
}

// function getValidPhone($file){
// 	global $APPLICATION;
// 	$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
// 	        "AREA_FILE_SHOW" => "file", 
// 	        "PATH" => "/include/".$file.".php"
// 	    )
// 	);	
// } 
?>