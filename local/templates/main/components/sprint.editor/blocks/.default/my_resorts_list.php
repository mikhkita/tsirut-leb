<?/** @var $block array */
?>
<?
$image = Sprint\Editor\Blocks\Image::getImage($block['image'], array(
    'width' => 408,
    'height' => 260,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>

<? if($block['open_cont']) :?>
	<div class="b-block">
	<div class="b-resorts-list">
<? endif; ?>

<div class="b-resorts-item">
	<div class="b-resorts-top">
		<div class="b-resorts-img" style="background-image: url(<?=$image['SRC']?>);"></div>
		<div class="blackout"></div>
		<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h3>
	</div>
	<div class="b-resorts-p"><?=Sprint\Editor\Blocks\Text::getValue($block['text'])?></div>
	<a href="<?=Sprint\Editor\Blocks\Text::getValue($block['link'])?>"><?=Sprint\Editor\Blocks\Text::getValue($block['text-link'])?></a>
</div>

<? if($block['close_cont']) :?>
	</div>
	</div>
<? endif; ?>


