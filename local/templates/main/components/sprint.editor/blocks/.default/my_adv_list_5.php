<?/** @var $block array */
?>
<?
$image = Sprint\Editor\Blocks\Image::getImage($block['image'], array(
    'width' => 236,
    'height' => 236,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>

<? if($block['open_cont']) :?>
	<div class="b-block">
	<div class="b-constructor-adv-list adv-list-5 mobile-slider">
<? endif; ?>

<div class="b-constructor-adv-item adv-5">
	<div class="b-constructor-adv-img" style="background-image: url(<?=$image['SRC']?>);"></div>
	<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h3>
	<div class="b-constructor-adv-p"><?=Sprint\Editor\Blocks\Text::getValue($block['text'])?></div>
</div>

<? if($block['close_cont']) :?>
	</div>
	</div>
<? endif; ?>


