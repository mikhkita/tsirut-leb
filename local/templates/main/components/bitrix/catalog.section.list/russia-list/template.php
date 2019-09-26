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
<?foreach ($arResult['SECTIONS'] as $arSection):?>
	<?
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	<?
	$img = CFile::ResizeImageGet($arSection["PICTURE"]["ID"], array('width'=>302*2, 'height'=>383*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
	?>
	<a href="<?=$arSection['SECTION_PAGE_URL'];?>" id="<? echo $this->GetEditAreaId($arSection['ID']);?>" class="b-country-item" style="background-image: url('<?=$img['src'];?>')">
		<div class="blackout"></div>
		<div class="blackout-full"></div>
		<div class="content">
			<div class="b-country-cont">
				<div class="b-country-info">
					<div class="info-wide">
						<h3><?=$arSection["UF_COUNTRY_NAME"]?></h3>
						<?if($arSection["UF_PRICE_FROM"]):?>
							<p>Туры от <?=numberFormat($arSection["UF_PRICE_FROM"])?> руб.</p>
						<?endif;?>
					</div>
				</div>
				<span class="b-btn-tr">Подобрать туры</span>
			</div>
		</div>
	</a>
<?endforeach;?>