<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";

//Получить все страны
$rsSect = CIBlockSection::GetList(
	array(),
	array(
		'IBLOCK_ID'=>1, 
		'SECTION_ID' => 1
	),
	false,
	array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_MONTH','UF_SEASON','UF_RESORT_ID_TV')
);

while($arSectCountry = $rsSect->GetNext()){
	groupingMonthsAndSeasons($arSectCountry);//группируем для страны

	$bs = new CIBlockSection;
	$arFields = Array(
		"ACTIVE" => "Y",
		"IBLOCK_SECTION_ID" => $arSectCountry["ID"],
		"IBLOCK_ID" => 1,
		"CODE" => "kurorty",
		"NAME" => "Курорты",
		"DESCRIPTION" => "",
		"DESCRIPTION_TYPE" => "",
	);

	$resortID = $bs->Add($arFields);
	$log .= "Раздел 'Курорты' создан. ID = ".$resortID;
	$log .= "\n";

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
		groupingMonthsAndSeasons($value);//группируем для курортов страны
		if($resortID > 0){
			$bs = new CIBlockSection;
			$arFields = Array(
				"IBLOCK_SECTION_ID" => $resortID
			);
			$res = $bs->Update($value["ID"], $arFields);
		}else{
		  $log .= $bs->LAST_ERROR;
		  $log .= "\n";
		}
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
	  $log .= "\n";
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
	  $log .= "\n";
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
	  $log .= "\n";
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
	  $log .= "\n";
	}
}

echo $log;
writeLog($log, "groupingMonthsLogs.txt");
			
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>