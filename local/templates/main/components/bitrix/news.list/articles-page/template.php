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
<div class="b-article-page-list">
<?foreach($arResult["ITEMS"] as $arItem):?><?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?><?
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>302*2, 'height'=>180*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
	?><div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-article-page-item">
		<a class="b-img" href="<?=$arItem['DETAIL_PAGE_URL']?>" style="background-image: url(<?=$img['src']?>)"></a>
		<div class="b-right">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h3><?=$arItem['NAME']?></h3></a>
			<?$date = CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arElement["DATE_CREATE"], CSite::GetDateFormat()));?>
			<div class="date"><?=$date?></div>
			<p><?=$arItem['PREVIEW_TEXT']?></p>
		</div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>