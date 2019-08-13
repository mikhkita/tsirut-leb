<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$month = date('n');
?>
<div class="b-categories-list clearfix">
	<div class="mobile-overflow">
		<div class="b-categories-item active">
			<div class="icon icon-planet"></div>
			<p>Любой</p>
		</div>
		<?//получить и перебрать категории
		$arCategories = array();
		global $USER_FIELD_MANAGER;
		$arFields = $USER_FIELD_MANAGER->GetUserFields("USER");
		$obEnum = new CUserFieldEnum;
		$rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => UF_CATEGORIES));
		while($arEnum = $rsEnum->GetNext()){
		  	$arCategories[] = $arEnum;
		}
		?>
		<?foreach ($arCategories as $item):?>
			<div class="b-categories-item" data-class="category-<?=$item['ID']?>">
				<div class="icon icon-category-<?=$item['ID']?>"></div>
				<p><?=$item['VALUE']?></p>
			</div>
		<?endforeach;?>
	</div>
</div>
<div class="b-country-list square clearfix">
	<?foreach ($arResult['SECTIONS'] as $arSection):?>
		<?
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
		<?
		$img = CFile::ResizeImageGet($arSection["PICTURE"]["ID"], array('width'=>302*2, 'height'=>383*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
		?>
		<?
		$classList = "";
		foreach ($arSection["UF_CATEGORIES"] as $item) {
			$classList .= "category-".$item." ";
		}
		?>
		<a href="<?=$arSection['SECTION_PAGE_URL'];?>" id="<? echo $this->GetEditAreaId($arSection['ID']);?>" class="b-country-item <?=$classList?>" style="background-image: url('<?=$img['src'];?>')">
			<div class="blackout"></div>
			<div class="blackout-full"></div>
			<div class="content">
				<div class="b-country-cont">
					<div class="b-country-info">
						<div class="info-left">
							<p class="visa"><?=UserFieldValue($arSection["UF_VISA"])?></p>
							<h3><?=$arSection["UF_COUNTRY_NAME"]?></h3>
							<p class="price">Туры от <?=numberFormat($arSection["UF_PRICE_FROM"])?> руб.</p>
						</div>
						<div class="info-right">
							<?if($arSection["UF_T_AIR_".$month]):?>
								<div class="air-t"><span class="icon icon-sun"></span><p><?=$arSection["UF_T_AIR_".$month]?></p></div>
							<?endif;?>
							<?if($arSection["UF_T_WATER_".$month]):?>
								<div class="water-t"><span class="icon icon-wave"></span><p><?=$arSection["UF_T_WATER_".$month]?></p></div>
							<?endif;?>
						</div>
					</div>
					<span class="b-btn-tr">Подобрать туры</span>
				</div>
			</div>
		</a>
	<?endforeach;?>
</div>
<div class="center">
	<a href="#" class="show-more b-btn b-btn-blue one-line">
		<p class="btn-bold">Показать ещё</p>
	</a>
</div>
