<form class="b-mailing-form" method="post" action="/subscribe.php">
	<div class="b-mailing-form-inputs">
		<input type="text" name="name" placeholder="Ваше имя" required>
		<input type="text" name="email" placeholder="Ваш e-mail" required>
	</div>
	<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
	<a href="#b-subscribe-success" class="b-thanks-link fancy" style="display:none;"></a>
	<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
		<p class="btn-bold">Подписаться</p>
	</a>
	<div class="b-checkbox">
		<input id="TVcheckbox-politics-1" type="checkbox" name="politics" checked required>
		<label for="TVcheckbox-politics-1">
			<div class="b-checked icon-checked"></div>
			<p>Заполняя форму вы подтверждаете <a href="/policy.pdf" target="_blank">согласие на обработку персональных данных.</a></p>
		</label>
	</div>
	<input type="submit" value="Подписаться" style="display:none;">
</form>