<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $prevLevel = 1; ?>
<?if (!empty($arResult)):?>
	<ul>
		<?
		foreach($arResult as $i => $arItem):
		$isNextSub = (isset($arResult[$i+1]) && $arResult[$i+1]["DEPTH_LEVEL"] > $arItem["DEPTH_LEVEL"])
		?>
			<? if($arItem["DEPTH_LEVEL"] < $prevLevel): ?>
				<? if( $prevLevel - $arItem["DEPTH_LEVEL"] == 2): ?>
					</ul></li></ul></li>
				<? else: ?>
					</li></ul>
				<? endif; ?>
			<? endif; ?>
			
			<? if($arItem["DEPTH_LEVEL"] > $prevLevel): ?>
				<ul class="b-submenu">
			<? elseif( $i != 0 ): ?>
				</li>
			<? endif; ?>
			
			<li><a href="<?=$arItem["LINK"]?>" <?if($arItem["SELECTED"]):?> class="active"<?endif;?>><?=$arItem["TEXT"]?></a>
			<? $prevLevel = $arItem["DEPTH_LEVEL"]; ?>
		<?endforeach?>
				</li>
			</ul>
		</li>
	</ul>
	<a href="/search/" class="b-search-tours">
		<p>
			<span class="desktop">Перейти в поиск туров</span>
			<span class="tablet">Поиск туров</span>
		</p>
		<span class="icon-next"></span>
	</a>
<?endif?>

<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>