<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";

//Айдишники стран, для которых нужно сгенерить месяцы
$IDs = array(4,5);

$months = array(
	UF_MONTH_1 => "Январь",
	UF_MONTH_2 => "Февраль",
	UF_MONTH_3 => "Март",
	UF_MONTH_4 => "Апрель",
	UF_MONTH_5 => "Май",
	UF_MONTH_6 => "Июнь",
	UF_MONTH_7 => "Июль",
	UF_MONTH_8 => "Август",
	UF_MONTH_9 => "Сентябрь",
	UF_MONTH_10 => "Октябрь",
	UF_MONTH_11 => "Ноябрь",
	UF_MONTH_12 => "Декабрь",
);

$seasons = array(
	UF_SEASON_SUMMER => "Лето",
	UF_SEASON_AUTUNM => "Осень",
	UF_SEASON_WINTER => "Зима",
	UF_SEASON_SPRING => "Весна",
);

function getCode($name){
	$params = array(
	  "max_len" => "100", 
	  "change_case" => "L", 
	  "replace_space" => "_", 
	  "replace_other" => "_", 
	  "delete_repeat_replace" => "true",
	);
	return CUtil::translit($name, "ru", $params);
}

function createMonthsAndSeasons($arSect){
	global $months, $seasons, $log;
	//Получить месяцы, которые уже созданы для этой страны/курорта
	$rsSectMonth = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
		   'SECTION_ID' => $arSect['ID'],
		   '!UF_MONTH' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
	);
	$monthList = array();
	while ($arSectMonth = $rsSectMonth->GetNext()){
		$monthList[] = $arSectMonth["UF_MONTH"];
	}

	$sort = 100;
	foreach ($months as $month => $name) {
		if(!in_array($month, $monthList)){//если этот месяц ещё не создан, то создать

			$bs = new CIBlockSection;

			$code = getCode($name);

			$arFields = Array(
				"ACTIVE" => "Y",
				"IBLOCK_SECTION_ID" => $arSect["ID"],
				"IBLOCK_ID" => 1,
				"CODE" => $code,
				"NAME" => $name,
				"SORT" => $sort,
				"DESCRIPTION" => "",
				"DESCRIPTION_TYPE" => "",
				"UF_MONTH" => $month,
				"UF_HEADER_TEXT" => $arSect["UF_HEADER_TEXT"],
				"UF_HEADER_VISA" => $arSect["UF_HEADER_VISA"],
				"UF_HEADER_TIME" => $arSect["UF_HEADER_TIME"],
				"UF_HEADER_TV" => $arSect["UF_HEADER_TV"],
			);

			$ID = $bs->Add($arFields);
			$res = ($ID>0);

			if($res){
			  $log .= "Месяц создан. ID = ".$ID;
			  $log .= "\n";
			}else{
			  $log .= $bs->LAST_ERROR;
			  $log .= "\n";
			}
		}
		$sort++;
	}

	//Получить сезоны, которые уже созданы для этой страны/курорта
	$rsSectSeason = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
		   'SECTION_ID' => $arSect['ID'],
		   '!UF_SEASON' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
	);
	$seasonList = array();
	while ($arSectSeason = $rsSectSeason->GetNext()){
		$seasonList[] = $arSectSeason["UF_SEASON"];
	}

	$sort = 100;
	foreach ($seasons as $season => $name) {
		if(!in_array($season, $seasonList)){//если этот сезон ещё не создан, то создать
			$bs = new CIBlockSection;

			$code = getCode($name);

			$arFields = Array(
				"ACTIVE" => "Y",
				"IBLOCK_SECTION_ID" => $arSect["ID"],
				"IBLOCK_ID" => 1,
				"CODE" => $code,
				"NAME" => $name,
				"SORT" => $sort,
				"DESCRIPTION" => "",
				"DESCRIPTION_TYPE" => "",
				"UF_SEASON" => $season,
				"UF_HEADER_TEXT" => $arSect["UF_HEADER_TEXT"],
				"UF_HEADER_VISA" => $arSect["UF_HEADER_VISA"],
				"UF_HEADER_TIME" => $arSect["UF_HEADER_TIME"],
				"UF_HEADER_TV" => $arSect["UF_HEADER_TV"],
			);
			
			$ID = $bs->Add($arFields);
			$res = ($ID>0);

			if($res){
			  $log .= "Сезон создан. ID = ".$ID;
			  $log .= "\n";
			}else{
			  $log .= $bs->LAST_ERROR;
			  $log .= "\n";
			}
		}
		$sort++;
	}
}

$rsSect = CIBlockSection::GetList(
	array(),
	array('IBLOCK_ID'=>1, 'ID' => $IDs),
	false,
	array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
);

while($arSectCountry = $rsSect->GetNext()){
	createMonthsAndSeasons($arSectCountry);//генерим для страны

	//Получить курорты страны
	$rsSectResort = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSectCountry['IBLOCK_ID'],
		   'SECTION_ID' => $arSectCountry['ID'],
		   '!UF_RESORT_ID_TV' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
	);
	$arResorts = array();
	while ($arSectResort = $rsSectResort->GetNext()){
		$arResorts[] = $arSectResort;
	}
	foreach ($arResorts as $key => $value) {
		createMonthsAndSeasons($value);//генерим для курортов страны
	}
}

echo $log;
writeLog($log, "monthsLogs.txt");
			
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>