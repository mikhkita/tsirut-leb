<?/** @var $block array */
?>
<?
$params = array(
    'width' => 148,
    'height' => 143,
    'exact' => 0,
    //'jpg_quality' => 75
);
$image1 = Sprint\Editor\Blocks\Image::getImage($block['image-1'], $params);
$image2 = Sprint\Editor\Blocks\Image::getImage($block['image-2'], $params);
$image3 = Sprint\Editor\Blocks\Image::getImage($block['image-3'], $params);
?>



<div class="b b-about-sprint b-about-services b-about-wide">
	<div class="b-block">
		<h2 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<div class="b-about-services-list">
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image1['SRC']?>);"></div>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-1'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image2['SRC']?>);"></div>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-2'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image3['SRC']?>);"></div>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-3'])?></div>
			</div>
		</div>
	</div>
</div>


