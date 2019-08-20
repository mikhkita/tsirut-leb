<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";

//Айдишники стран, для которых нужно сгенерить месяцы
$IDs = array(3,4);

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

$rsSect = CIBlockSection::GetList(
	array(),
	array('IBLOCK_ID'=>1, 'ID' => $IDs),
	false,
	array()
);

while($arSect = $rsSect->GetNext()){
	//Получить месяцы, которые уже созданы для этой страны
	$rsSectMonth = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
		   '>LEFT_MARGIN' => $arSect['LEFT_MARGIN'],
		   '<RIGHT_MARGIN' => $arSect['RIGHT_MARGIN'],
		   '>DEPTH_LEVEL' => $arSect['DEPTH_LEVEL'],
		   '!UF_MONTH' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','UF_MONTH')
	);
	$monthList = array();
	while ($arSectMonth = $rsSectMonth->GetNext()){
		$monthList[] = $arSectMonth["UF_MONTH"];
	}

	$sort = 100;
	foreach ($months as $month => $name) {
		if(!in_array($month, $monthList)){//если этот месяц ещё не создан, то создать
			$bs = new CIBlockSection;

			$params = array(
		      "max_len" => "100", 
		      "change_case" => "L", 
		      "replace_space" => "_", 
		      "replace_other" => "_", 
		      "delete_repeat_replace" => "true",
		    );
	        $code = CUtil::translit($name, "ru", $params);

			$arFields = Array(
				"ACTIVE" => "Y",
				"IBLOCK_SECTION_ID" => $arSect["ID"],
				"IBLOCK_ID" => 1,
				"CODE" => $code,
				"NAME" => $name,
				"SORT" => $sort,
				"DESCRIPTION" => "",
				"DESCRIPTION_TYPE" => "",
				"UF_MONTH" => $month
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

	//Получить сезоны, которые уже созданы для этой страны
	$rsSectSeason = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSect['IBLOCK_ID'],
		   '>LEFT_MARGIN' => $arSect['LEFT_MARGIN'],
		   '<RIGHT_MARGIN' => $arSect['RIGHT_MARGIN'],
		   '>DEPTH_LEVEL' => $arSect['DEPTH_LEVEL'],
		   '!UF_SEASON' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','UF_SEASON')
	);
	$seasonList = array();
	while ($arSectSeason = $rsSectSeason->GetNext()){
		$seasonList[] = $arSectSeason["UF_SEASON"];
	}

	$sort = 100;
	foreach ($seasons as $season => $name) {
		if(!in_array($season, $seasonList)){//если этот сезон ещё не создан, то создать
			$bs = new CIBlockSection;

			$params = array(
		      "max_len" => "100", 
		      "change_case" => "L", 
		      "replace_space" => "_", 
		      "replace_other" => "_", 
		      "delete_repeat_replace" => "true",
		    );
	        $code = CUtil::translit($name, "ru", $params);

			$arFields = Array(
				"ACTIVE" => "Y",
				"IBLOCK_SECTION_ID" => $arSect["ID"],
				"IBLOCK_ID" => 1,
				"CODE" => $code,
				"NAME" => $name,
				"SORT" => $sort,
				"DESCRIPTION" => "",
				"DESCRIPTION_TYPE" => "",
				"UF_SEASON" => $season
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

echo $log;
writeLog($log, "monthsLogs.txt");
			
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>