<?/** @var $block array */?>

<div class="b-seo b-block">
	<div class="b-seo-two-blocks">
		<div class="seo-block first">
			<? if($block['value_title_1']) :?>
				<h2><?=$block['value_title_1']?></h2>
			<? endif; ?>
			<p><?=$block['value_1']?></p>
		</div>
		<div class="seo-block second">
			<? if($block['value_title_2']) :?>
				<h2><?=$block['value_title_2']?></h2>
			<? endif; ?>
			<p><?=$block['value_2']?></p>
		</div>
	</div>
</div>