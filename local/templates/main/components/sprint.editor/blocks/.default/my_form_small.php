<?/** @var $block array */?>

<div class="b-block">
	<div class="b-search-subscribe b-hot-search-subscribe">
		<div class="b-subscribe-cont">
			<div class="b-subscribe-form">
				<h2><?=$block["value_title"];?></h2>
				<div class="mailing-text"><?=$block["value"];?></div>
				<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
					<input type="text" name="name" placeholder="Ваше имя" required="">
					<input type="text" name="phone" placeholder="Ваш телефон" required="">
					<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
					<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
						<p class="btn-bold">Отправить</p>
					</a>
					<div class="b-checkbox">
						<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
						<label for="checkbox-search-2">
							<div class="b-checked icon-checked"></div>
							<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
						</label>
					</div>
					<input type="submit" value="Отправить" style="display:none;">
				</form>
			</div>
		</div>
	</div>
</div>