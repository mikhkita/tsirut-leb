<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="b-content-deatail">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
	$type = (int)$arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"];
	switch ($type) {
	    case 1:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-desc detail-margin-b" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
			<div class="b-block">
				<h2 class="b-title"><b><?=$arItem["PROPERTIES"]["B_1_HEADER"]["VALUE"]?></b></h2>
				<p><?=$arItem["PROPERTIES"]["B_1_TEXT"]["VALUE"]?></p>
			</div>
		</div>
	<?
	        break;
	    case 2:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-adv detail-margin-b-s">
			<div class="b-block">
				<div class="detail-wide">
					<h2 class="b-title detail-wide-cancel"><?=$arItem["NAME"];?></h2>
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			</div>
		</div>
	<?
	        break;
	    case 3:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-feedback b-feedback-shadow detail-margin-b">
			<div class="b-block">
				<div class="b-feedback-text">
					<h2><?=$arItem["PROPERTIES"]["B_FORM_HEADER"]["VALUE"]?></h2>
					<p><?=$arItem["PROPERTIES"]["B_FORM_TEXT"]["VALUE"]?></p>
					<form class="b-feedback-form" method="post" action="/subscribe.php">
						<input type="text" name="name" placeholder="Ваше имя" required>
						<input type="text" name="phone" placeholder="Ваш телефон" required>
						<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
						<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
						<a href="#" class="b-btn b-btn-orange ajax">
							<p class="btn-bold">Подберите мне тур</p>
							<p class="btn-regular">Хочу довериться профессионалам</p>
						</a>
						<div class="b-checkbox">
							<input id="personal-1" type="checkbox" name="personal" checked required>
							<label for="personal-1">
								<div class="b-checked icon-checked"></div>
								<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
							</label>
						</div>
					</form>
				</div>
				<div class="b-5-manager">
					<div class="b-5-name">
						<div class="div-p">
							 <?=includeArea("b-5-name");?>
						</div>
						 <small><?=includeArea("b-5-post");?></small>
					</div>
				</div>
			</div>
		</div>
	<?
	    	break;
	    case 4:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-resorts detail-margin-b-s">
			<div class="b-block">
				<h2 class="b-title regular"><b><?=$arItem["NAME"]?></b></h2>
				<div class="b-resorts-list detail-wide">
					<?=$arItem["PREVIEW_TEXT"]?>
				</div>
			</div>
		</div>
	<?
	    	break;
	    case 5:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-mailing detail-margin-b">
			<div class="b-block">
				<div class="b-mailing-cont">
					<div class="b-head-gradient"></div>
					<div class="gradient-after">
						<h2><?=$arItem["PROPERTIES"]["B_MAILING_HEADER"]["VALUE"]?></h2>
						<p class="mailing-text"><?=$arItem["PROPERTIES"]["B_MAILING_TEXT"]["VALUE"]?></p>
						<form class="b-mailing-form" method="post" action="/subscribe.php">
							<input type="text" name="email" placeholder="Ваш e-mail" required>
							<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
							<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
							<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
								<p class="btn-bold">Подписаться</p>
							</a>
							<div class="b-checkbox">
								<input id="checkbox-politics-1" type="checkbox" name="politics" checked required>
								<label for="checkbox-politics-1">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
								</label>
							</div>
						</form>
					</div>
				</div>
				<!-- VK Widget -->
				<div class="b-widget-vk">
					<div id="vk_groups"></div>
				</div>
				<script type="text/javascript">
					var myWidth = 0;
					if( typeof( window.innerWidth ) == 'number' ) {
			            myWidth = window.innerWidth;
			        } else if( document.documentElement && ( document.documentElement.clientWidth || 
			        document.documentElement.clientHeight ) ) {
			            myWidth = document.documentElement.clientWidth;
			        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
			            myWidth = document.body.clientWidth;
			        }

			        if(myWidth > 767){
			        	VK.Widgets.Group("vk_groups", {mode: 0, width: "288", height: "384", no_cover: 1}, 56008470);
			        }else{
			        	VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "200", no_cover: 1}, 56008470);
			        }
				</script>
			</div>
		</div>
	<?
	    	break;
	    case 6:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-articles detail-margin-b-s">
			<div class="b-block">
				<h2 class="b-title"><?=$arItem["NAME"]?></h2>
				<div class="b-article-list b-article-slider mobile-slider detail-wide">
					<?=$arItem["PREVIEW_TEXT"]?>
				</div>
			</div>
		</div>
	<?
	    	break;
	    case 7:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
	<?
			break;
		}?>
<?endforeach;?>
</div>