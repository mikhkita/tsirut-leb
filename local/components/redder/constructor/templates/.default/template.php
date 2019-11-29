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

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="b-text">
		<?$APPLICATION->IncludeComponent(
		    "sprint.editor:blocks",
		    ".default",
		    Array(
		        "ELEMENT_ID" => $arItem["ID"],
		        "IBLOCK_ID" => $arItem["IBLOCK_ID"],
		        "PROPERTY_CODE" => "EDITOR",
		    ),
		    $component,
		    Array(
		        "HIDE_ICONS" => "Y"
		    )
		);?>
	</div>
<?endforeach;?>
