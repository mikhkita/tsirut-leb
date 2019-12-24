<?/** @var $block array */?>

<div class="b b-feedback b-feedback-shadow">
	<div class="b-block">
		<div class="b-feedback-text">
			<h2><b><?=$block["value_title"];?></b></h2>
			<p><?=$block["value"];?></p>
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
						<p>Заполняя форму вы подтверждаете <a href="/policy.pdf" target="_blank">согласие на обработку персональных данных.</a></p>
					</label>
				</div>
				<input type="submit" value="Подписаться" style="display:none;">
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