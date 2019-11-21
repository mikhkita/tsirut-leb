<?/** @var $block array */
?>
<?
$image = Sprint\Editor\Blocks\Image::getImage($block['image'], array(
    'width' => 1024,
    'height' => 768,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>
<div class="b-block">
<div class="b-advice clearfix">
	<?if ($image):?>
		<img alt="<?=$image['DESCRIPTION']?>" src="<?=$image['SRC']?>">
	<?endif;?>
	<div class="b-advice-text">
		<?=Sprint\Editor\Blocks\Text::getValue($block['text'])?>
	</div>
</div>
</div>


