<?/** @var $block array */
?>
<?
$image = Sprint\Editor\Blocks\Image::getImage($block['image'], array(
    'width' => 640,
    'height' => 440,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>

<div class="b-block">
	<div class="b-constructor-adv-main">
		<?if ($image):?>
			<div class="adv-main-left">
		 		<img alt="<?=$image['DESCRIPTION']?>" src="<?=$image['SRC']?>">
			</div>
		<?endif;?>
		<div class="adv-main-right">
			<?=Sprint\Editor\Blocks\Text::getValue($block['text'])?>
		</div>
	</div>
</div>


