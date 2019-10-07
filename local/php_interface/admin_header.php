<? CJSCore::Init( 'jquery' ); ?>

<!-- Страны и курорты -->
<? 
if( $_SERVER["SCRIPT_NAME"] == "/bitrix/admin/iblock_element_edit.php" && $_REQUEST["IBLOCK_ID"] == 1 ):
?>
<style>

</style>
<script>
$(document).ready(function(){
	$("select[name='PROP[4][]']").change(getFields);
	function getFields(){
		var type = $("select[name='PROP[4][]']").val();
		if(!type){
			$("#tr_PREVIEW_PICTURE, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").hide();
			return false;
		}
		switch(type) {
			case "1"://широкий блок
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст блока");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL, #tr_PREVIEW_PICTURE").show();
				break;
			case "2"://преимущества
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PREVIEW_PICTURE").hide();
				break;
			case "3"://форма
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст формы");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PREVIEW_PICTURE").hide();
				break;
			case "4"://курорты
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PREVIEW_PICTURE").hide();
				break;
			case "5"://рассылка
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст формы рассылки");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PREVIEW_PICTURE").hide();
				break;
			case "6"://статьи
				$("#tr_PREVIEW_PICTURE, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").hide();
				break;
			case "7"://СЕО
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PREVIEW_PICTURE").hide();
				break;
		}
	}
	getFields();
});
</script>
<? endif; ?>

<!-- Конструктор -->
<? 
if( $_SERVER["SCRIPT_NAME"] == "/bitrix/admin/iblock_element_edit.php" && $_REQUEST["IBLOCK_ID"] == 8 ):
?>
<style>

</style>
<script>
$(document).ready(function(){
	$("select[name='PROP[22][]']").change(getFields);
	function getFields(){
		var type = $("select[name='PROP[22][]']").val();
		if(!type){
			$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL, #tr_PREVIEW_PICTURE, #tr_PROPERTY_24").hide();
			return false;
		}
		switch(type) {
			case "11"://широкий блок
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст блока");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL, #tr_PREVIEW_PICTURE").show();
				$("#tr_PROPERTY_24").hide();
				break;
			case "12"://преимущества
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_24, #tr_PREVIEW_PICTURE").hide();
				break;
			case "13"://форма
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст формы");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_24, #tr_PREVIEW_PICTURE").hide();
				break;
			case "14"://курорты
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_24, #tr_PREVIEW_PICTURE").hide();
				break;
			case "15"://рассылка
				$("#tr_PREVIEW_TEXT_LABEL td").text("Текст формы рассылки");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_24, #tr_PREVIEW_PICTURE").hide();
				break;
			case "16"://статьи
				$("#tr_PROPERTY_24").show();
				$("#tr_PREVIEW_PICTURE, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").hide();
				break;
			case "17"://СЕО
				$("#tr_PREVIEW_TEXT_LABEL td").text("Контент");
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_24, #tr_PREVIEW_PICTURE").hide();
				break;
		}
	}
	getFields();
});
</script>
<? endif; ?>