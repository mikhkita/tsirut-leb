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
<ul class="b-articles-page-tags">
<?//print_r($arResult);?>
<?if(is_array($arResult["SEARCH"]) && !empty($arResult["SEARCH"])):?>
	<?foreach ($arResult["SEARCH"] as $key => $res):?>
	<li class="tag-item">
		<a href="/articles-tag/<?=$res["NAME"]?>/"><?=$res["NAME"]?></a>
	</li>
	<?endforeach;?>
<?endif;?>

</ul>