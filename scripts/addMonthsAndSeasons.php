<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";

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
			  $log .= "<br/>";
			}else{
			  $log .= $bs->LAST_ERROR;
			  $log .= "<br/>";
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
			  $log .= "<br/>";
			}else{
			  $log .= $bs->LAST_ERROR;
			  $log .= "<br/>";
			}
		}
		$sort++;
	}
}

function groupingMonthsAndSeasons($arSect){
	global $log;
	//создать раздел "Месяцы"
	$bs = new CIBlockSection;

	$arFields = Array(
		"ACTIVE" => "Y",
		"IBLOCK_SECTION_ID" => $arSect["ID"],
		"IBLOCK_ID" => 1,
		"CODE" => "mesyatsy",
		"NAME" => "Месяцы",
		"DESCRIPTION" => "",
		"DESCRIPTION_TYPE" => "",
	);

	$ID = $bs->Add($arFields);
	$res = ($ID>0);

	if($res){
	  $log .= "Раздел 'Месяцы' создан. ID = ".$ID;
	  $log .= "<br/>";
	  //Изменить родительский раздел у месяцев
	  $rsSectMonth = CIBlockSection::GetList(
			array('sort' => 'asc'),
			array(
			   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
			   'SECTION_ID' => $arSect['ID'],
			   '!UF_MONTH' => false
			),
			false,
			array('IBLOCK_ID','ID','NAME','CODE','UF_MONTH')
		);

		while ($arSectMonth = $rsSectMonth->GetNext()){
			$bs = new CIBlockSection;
			$arFields = Array(
				"IBLOCK_SECTION_ID" => $ID
			);
			$res = $bs->Update($arSectMonth["ID"], $arFields);
		}
	}else{
	  $log .= $bs->LAST_ERROR;
	  $log .= "<br/>";
	}

	//Создать раздел "Сезоны"
	$bs = new CIBlockSection;

	$arFields = Array(
		"ACTIVE" => "Y",
		"IBLOCK_SECTION_ID" => $arSect["ID"],
		"IBLOCK_ID" => 1,
		"CODE" => "sezony",
		"NAME" => "Сезоны",
		"DESCRIPTION" => "",
		"DESCRIPTION_TYPE" => "",
	);

	$ID = $bs->Add($arFields);
	$res = ($ID>0);

	if($res){
	  $log .= "Раздел 'Сезоны' создан. ID = ".$ID;
	  $log .= "<br/>";
	  //Изменить родительский раздел у сезонов
	  $rsSectSeason = CIBlockSection::GetList(
			array('sort' => 'asc'),
			array(
			   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
			   'SECTION_ID' => $arSect['ID'],
			   '!UF_SEASON' => false
			),
			false,
			array('IBLOCK_ID','ID','NAME','CODE','UF_SEASON')
		);

		while ($arSectSeason = $rsSectSeason->GetNext()){
			$bs = new CIBlockSection;
			$arFields = Array(
				"IBLOCK_SECTION_ID" => $ID
			);
			$res = $bs->Update($arSectSeason["ID"], $arFields);
		}
	}else{
	  $log .= $bs->LAST_ERROR;
	  $log .= "<br/>";
	}
}

if(isset($_GET["ID"]) && !empty($_GET["ID"])){
	$rsSectResort = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => 1, 
		   'ID' => (int)$_GET["ID"]
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
	);
	if ($arSectResort = $rsSectResort->GetNext()){
		createMonthsAndSeasons($arSectResort);
		groupingMonthsAndSeasons($arSectResort);
	}else{
		$log .= "Ошибка! Курорт с таким ID не найден";
	}
}else{
	$log .= "Ошибка! Не установлен ID курорта";
}

echo $log;
writeLog($log, "addMonthsLogs.txt");
			
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>