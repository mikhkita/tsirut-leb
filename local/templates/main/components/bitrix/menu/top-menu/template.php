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
	<a href="/search/" class="b-search-tours">
		<p>
			<span class="desktop">Перейти в поиск туров</span>
			<span class="tablet">Поиск туров</span>
		</p>
		<span class="icon-next"></span>
	</a>
<?endif?>