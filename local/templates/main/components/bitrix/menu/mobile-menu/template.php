<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul> 
	<?foreach($arResult as $arItem):?>
	  <?if($arItem["SELECTED"]):?>
	       <li><a href="<?=$arItem["LINK"]?>" class="active">
	       <?=$arItem["TEXT"]?></a></li>
	  <?else:?>
	       <li><a href="<?=$arItem["LINK"]?>">
	       <?=$arItem["TEXT"]?></a></li>
	  <?endif?>
	<?endforeach?>
	</ul>
	<div class="slideout-button">
		<a href="/tours/" class="b-btn b-btn-blue one-line">
			<p class="btn-bold">Поиск туров</p>
		</a>
	</div>
<?endif?>