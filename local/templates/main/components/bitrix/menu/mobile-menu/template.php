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
				<ul class="b-submenu-mobile">
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
	<div class="slideout-button">
		<a href="/tours/poisk/" class="b-btn b-btn-blue one-line">
			<p class="btn-bold">Поиск туров</p>
		</a>
	</div>
<?endif?>