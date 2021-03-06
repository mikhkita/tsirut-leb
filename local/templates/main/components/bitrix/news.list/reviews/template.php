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
<div class="b-review-list <?if(isset($arParams["CUSTOM_SLIDER"]) && $arParams["CUSTOM_SLIDER"] == "Y") echo 'b-review-slider';?>">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
	if ($arItem["PREVIEW_PICTURE"]["ID"]) {
		$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>100*2, 'height'=>100*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
	} else {
		$img['src'] = SITE_TEMPLATE_PATH."/html/i/icon-man.svg";
	}
	?>
	<div class="b-review-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="b-review-cont">
			<div class="b-review-top">
				<div class="b-review-img-cont">
					<div class="b-review-img" style="background-image: url('<?=$img['src']?>')"></div>
				</div>
				<div class="b-review-name">
					<h3><?=$arItem["NAME"]?></h3>
					<div class="b-review-date"><?=$arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
					<div class="b-review-tour"><?=$arItem["PROPERTIES"]["TOUR"]["VALUE"]?></div>
				</div>
			</div>
			<p><?=mb_substr($arItem["PREVIEW_TEXT"],0,250);?></p>
		</div>
		<div class="read-more-cont">
			<a href="#b-popup-review" data-id="<?=$arItem['ID']?>" class="fancy-ajax read-more dashed">Читать полностью</a>
		</div>
	</div>
<?endforeach;?>
</div>
<div class="center">
	<a href="#b-popup-review-form" class="b-btn b-btn-blue one-line fancy">
		<p class="btn-bold">Оставить отзыв</p>
	</a>
</div>
