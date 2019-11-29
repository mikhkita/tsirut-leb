<?/** @var $block array */
?>
<?
$image = Sprint\Editor\Blocks\Image::getImage($block['image'], array(
    'width' => 1920,
    'height' => 553,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>

<div class="b-constructor-desc detail-margin-b" style="background-image: url('<?=$image['SRC']?>')">
	<div class="blackout"></div>
	<div class="b-block">
		<h2 class="b-title"><b><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></b></h2>
		<div class="preview-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text'])?></div>
	</div>
</div>


