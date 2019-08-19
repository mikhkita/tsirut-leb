<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";
//перебрать все страны
$rsParentSection = CIBlockSection::GetByID(1);
if ($arParentSection = $rsParentSection->GetNext()){
	//Получить все курорты
	$rsSect = CIBlockSection::GetList(
		array(),
		array('IBLOCK_ID' => $arParentSection['IBLOCK_ID']),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','UF_RESORT_ID_TV')
	);
	$arResort = array();
	while ($arSect = $rsSect->GetNext()){
		if(!empty($arSect['UF_RESORT_ID_TV'])){
			$arResort[] = $arSect['UF_RESORT_ID_TV'];
		}
	}

	$arFilter = array(
	   'IBLOCK_ID' => $arParentSection['IBLOCK_ID'],
	   '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],
	   '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],
	   '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']
	);
	$rsSect = CIBlockSection::GetList(
		array(),
		$arFilter,
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID','DESCRIPTION','DETAIL_PICTURE','UF_COUNTRY_NAME','UF_HEADER_TEXT','UF_HEADER_VISA','UF_POPULAR_RESORT','UF_HEADER_TIME','UF_HEADER_TV','UF_COUNTRY_ID_TV','UF_RESORT_ID_TV','UF_CITY_ID_TV','UF_MONTH','UF_SEASON')
	);
	while ($arSect = $rsSect->GetNext()){
		if(!empty($arSect['UF_POPULAR_RESORT'])){
			//перебрать все курорты из поля "популярные курорты"
			foreach ($arSect['UF_POPULAR_RESORT'] as $value) {
				$country = explode("|", $value); // имя курорта | ID в турвизоре
				if ($country[0] && $country[1]){
					if(in_array($country[1], $arResort)){//если уже создан, то обновить
						// $arFields = Array(
						//     "ACTIVE" => "Y",
						// 	"IBLOCK_SECTION_ID" => $arSect["ID"],
						// 	"IBLOCK_ID" => 1,
						// 	"NAME" => $country[0],
						// 	"CODE" => $code,
						// 	"SORT" => "",
						// 	"PICTURE" => "",
						// 	"DESCRIPTION" => "",
						// 	"DESCRIPTION_TYPE" => ""
						//  );

						// if($ID > 0){
						//   $res = $bs->Update($ID, $arFields);
						// }
					}else{//создать
						$bs = new CIBlockSection;

						$params = array(
					      "max_len" => "100", 
					      "change_case" => "L", 
					      "replace_space" => "_", 
					      "replace_other" => "_", 
					      "delete_repeat_replace" => "true",
					    );
				        $code = CUtil::translit($country[0], "ru", $params);

						$arFields = Array(
							"ACTIVE" => "Y",
							"IBLOCK_SECTION_ID" => $arSect["ID"],
							"IBLOCK_ID" => 1,
							"NAME" => $country[0],
							"CODE" => $code,
							"SORT" => "",
							"PICTURE" => "",
							"DESCRIPTION" => "",
							"DESCRIPTION_TYPE" => ""
						);
						$ID = $bs->Add($arFields);
						$res = ($ID>0);

						if($res){
						  $log .= "Курорт создан. ID = ".$ID;
						  $log .= "\n";
						}else{
						  $log .= $bs->LAST_ERROR;
						  $log .= "\n";
						}
					}
				}else{
					$log .= "Отсутствует один из параметров. Название курорта: ".$country[0].", ID курорта: ".$country[1]."\n";
				}
			}
		}
	
	}
}

echo $log;
writeLog($log, "resortLogs.txt");
			
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>