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
$image4 = Sprint\Editor\Blocks\Image::getImage($block['image-4'], $params);
$image5 = Sprint\Editor\Blocks\Image::getImage($block['image-5'], $params);

$imageBack = Sprint\Editor\Blocks\Image::getImage($block['image-back'], array(
    'width' => 1920,
    'height' => 607,
    'exact' => 0,
    //'jpg_quality' => 75
));
?>



<?if(!empty($imageBack)):?>
	<div class="b b-about-sprint b-about-sprint-5 b-about-services b-about-wide" style="background-image: url(<?=$imageBack['SRC']?>);">
		<div class="b-head-gradient"></div>
<?else:?>
	<div class="b b-about-sprint b-about-sprint-5 b-about-sprint-no-back b-about-services b-about-wide">
<?endif;?>
	<div class="b-block">
		<h2 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<div class="b-about-services-list mobile-slider">
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image1['SRC']?>);"></div>
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['title-1']))):?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-1'])?></h3>
				<?endif;?>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-1'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image2['SRC']?>);"></div>
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['title-2']))):?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-2'])?></h3>
				<?endif;?>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-2'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image3['SRC']?>);"></div>
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['title-3']))):?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-3'])?></h3>
				<?endif;?>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-3'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image4['SRC']?>);"></div>
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['title-4']))):?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-4'])?></h3>
				<?endif;?>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-4'])?></div>
			</div>
			<div class="b-about-services-item">
				<div class="sprint-img" style="background-image: url(<?=$image5['SRC']?>);"></div>
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['title-5']))):?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-5'])?></h3>
				<?endif;?>
				<div class="sprint-text"><?=Sprint\Editor\Blocks\Text::getValue($block['text-5'])?></div>
			</div>
		</div>
	</div>
</div>


