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
	<div class="b-constructor-adv-list">
<? endif; ?>

<div class="b-constructor-adv-item">
	<div class="b-constructor-adv-img">
		 <img alt="<?=$image['DESCRIPTION']?>" src="<?=$image['SRC']?>">
	</div>
	<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h3>
	<div class="b-constructor-adv-p"><?=Sprint\Editor\Blocks\Text::getValue($block['text'])?></div>
</div>

<? if($block['close_cont']) :?>
	</div>
	</div>
<? endif; ?>


