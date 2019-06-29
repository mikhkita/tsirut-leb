<? CJSCore::Init( 'jquery' ); ?>

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
			$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_PICTURE, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").hide();
			return false;
		}
		switch(type) {
			case "1"://широкий блок
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PREVIEW_PICTURE").show();
				$("#tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").hide();
				break;
			case "2"://преимущества
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_PICTURE").hide();
				break;
			case "3"://форма
				$("#tr_PROPERTY_7, #tr_PROPERTY_8").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL, #tr_PREVIEW_PICTURE").hide();
				break;
			case "4"://курорты
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_PICTURE").hide();
				break;
			case "5"://рассылка
				$("#tr_PROPERTY_9, #tr_PROPERTY_10").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL, #tr_PREVIEW_PICTURE").hide();
				break;
			case "6"://статьи
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_PICTURE").hide();
				break;
			case "7"://СЕО
				$("#tr_PREVIEW_TEXT_EDITOR, #tr_PREVIEW_TEXT_LABEL").show();
				$("#tr_PROPERTY_5, #tr_PROPERTY_6, #tr_PROPERTY_7, #tr_PROPERTY_8, #tr_PROPERTY_9, #tr_PROPERTY_10, #tr_PREVIEW_PICTURE").hide();
				break;
		}
	}
	getFields();
});
</script>
<? endif; ?>