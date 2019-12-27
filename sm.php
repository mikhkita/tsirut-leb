<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$GLOBALS['APPLICATION']->RestartBuffer();

//Генерация для iblock = 1

$custom_content = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

function addSitemapItem($loc){
	global $custom_content;
	$custom_content .= '<url>'.
							'<loc>'.$loc.'</loc>'.
							'<lastmod>'.date("c").'</lastmod>'.
						'</url>';
}

//получить страны
$rsSectCountry = CIBlockSection::GetList(
	array(),
	array('IBLOCK_ID'=>1),
	false,
	array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID')
);
while($arSectCountry = $rsSectCountry->GetNext()){
	$countryUrl = 'https://bel-turist.ru/tours/'.$arSectCountry['CODE'].'/';
	addSitemapItem($countryUrl);
	//Для каждой страны получить курорты
	$rsSectResort = CIBlockSection::GetList(
		array('sort' => 'asc'),
		array(
		   'IBLOCK_ID' => $arSectCountry['IBLOCK_ID'],
		   'SECTION_ID' => $arSectCountry['ID'],
		   '!UF_RESORT_ID_TV' => false
		),
		false,
		array('IBLOCK_ID','ID','NAME','CODE','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','IBLOCK_SECTION_ID')
	);

	while ($arSectResort = $rsSectResort->GetNext()){
		addSitemapItem($countryUrl.$arSectResort['CODE'].'/');
		//Для каждого курорта получить месяцы

		//сезоны
	}
	//сезоны

	//месяцы

	//
}

file_put_contents('sitemap_iblock_1.txt', $custom_content);
?>