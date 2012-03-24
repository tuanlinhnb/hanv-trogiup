<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile('/static/ckeditor/ckeditor.js');
	$cs->registerScriptFile('/static/ckeditor/ckfinder/ckfinder.js');
	?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="row">
		<div class="info">
		<b>Parent category</b> (<a href='#' onclick="jQuery('#divSuggestedCat').toggle('slow'); return false;"><em>Change</em></a>) <br>
		<p class="note" id="divParentInfo">
			<?php if ($parentModel) {?>

			Root &nbsp;&raquo;&nbsp;
			<?php
				foreach ($parentModel->path as $e) {
					echo CHtml::link($e->name, $this->createUrl('view', array('id'=>$e->id)));
					echo '&nbsp;&raquo;&nbsp';
				}
				echo CHtml::link($parentModel->title, $this->createUrl('view', array('id'=>$parentModel->id)));
			?>
			<?php } else { ?>
			This is root category.
			<?php } ?>
		</p>
		</div>

		<div class="suggest" id="divSuggestedCat" style="display: none;">
			<?php echo $this->renderPartial('_suggested_cats', array('model'	=>	$fModel)) ; ?>
		</div>
	</div>
	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'input_form')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_key'); ?>
		<?php echo $form->textField($model,'url_key',array('size'=>50,'maxlength'=>50,'class'=>'input_form')); ?>
		<?php echo $form->error($model,'url_key'); ?>
	</div>
	<?php echo $form->hiddenField($model, 'parent_id', array('id'=>'iptParentId',)); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50,)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->radioButtonList($model,'active', array(
			'1'	=>	"Yes",
			'0'	=>	'No',
			),
			array(
				'template'=> '<div class="radio_form">{input}{label}</div>',
				'separator'=>' ',
			)
		); ?>
		<?php echo $form->error($model,'enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_home'); ?>
		<?php echo $form->radioButtonList($model,'default_home', array(
			'1'	=>	"Yes",
			'0'	=>	'No',
			),
			array(
				'template'=> '<div class="radio_form">{input}{label}</div>',
				'separator'=>' ',
			)
		); ?>
		<?php echo $form->error($model,'enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'index'); ?>
		<?php echo $form->textField($model,'index',array('onkeypress'=> 'return numbersonly(this, event)')); ?>
		<?php echo $form->error($model,'index'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script language="JavaScript">
<!--
jQuery(function($) {
	$('#divParentInfo')[0].setParentCatInfo = function(id, html) {
		console.log(html);
		$('#iptParentId').val(id);
		var div = $('#divParentInfo');
		div[0].newHtml = html;
		div.fadeOut('slow', function() {
			$(this).html(this.newHtml);
			$(this).fadeIn();
		});
		$('#divSuggestedCat').toggle('slow');
	};
});
//-->

  CKEDITOR.replace( 'Entry[content]',
{
	filebrowserBrowseUrl : '/static/ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '/static/ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '/static/ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '/static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);
function numbersonly(myfield, e, dec)
	{
		var key;
		var keychar;

		if (window.event)
		   key = window.event.keyCode;
		else if (e)
		   key = e.which;
		else
		   return true;
		keychar = String.fromCharCode(key);

		// control keys
		if ((key==null) || (key==0) || (key==8) ||
			(key==9) || (key==13) || (key==27) )
		   return true;

		// numbers
		else if ((("0123456789").indexOf(keychar) > -1))
		   return true;

		// decimal point jump
		else if (dec && (keychar == "."))
		   {
		   myfield.form.elements[dec].focus();
		   return false;
		   }
		else
		   return false;
	}
</script>