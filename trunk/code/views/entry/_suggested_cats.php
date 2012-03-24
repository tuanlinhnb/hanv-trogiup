<?php echo CHtml::textField('suggestKeyword', $model->suggestKeyword, array('id'=>'iptSuggestKeyword')); ?>
<?php
	echo CHtml::button('Search', array('name'=>'btnSearch', 'id'=>'btnSearch'));
?>

<?php
	echo CHtml::link('Root category', '#', array('id'=>'btnChangeToRootCat'));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suggested-category-grid',
	'dataProvider'=>$model->suggestCats,
	'columns'=>array(
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link($data->title, Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey,)), array("rev"=>$data->id))',
		),
		array(
			'header'	=>	'Path',
			'type'	=>	'raw',
			'value'	=>	function ($data) {
				$html = CHtml::link('Root', Yii::app()->controller->createUrl("index"));
				$html = 'Root';
				$pid = $data->parent_id;
				$path = array();
				while (!empty($pid)) {
					$parent = Entry::model()->findByPk($pid);
					$path[]=$parent;
					$pid = $parent->parent_id;
				};
				foreach ($path as $e) {
					$html .= '&nbsp;&raquo;&nbsp;';
					$html .= CHtml::link($e->title, Yii::app()->controller->createUrl("view",array("id"=>$e->id)));
				}

				return $html;
			},
		),
		array(
			'class'=>'CButtonColumn',
			'buttons'	=>	array(
				'select'	=>	array(
					'label'	=>	'select',
					#'url'	=>	'Yii::app()->controller->createUrl("create",array("pid"=>$data->primaryKey))',
					#'click'	=>	'function(e){alert("abc");}',
				),
			),
			'template'	=>	'{select}',
		),
	),
)); ?>

<script language="JavaScript">
<!--
jQuery(function($) {


var suggestCatsFunc = function()
{
	jQuery.ajax({
		url: '<?php echo $this->createUrl('suggest'); ?>',
		data: {
			suggestKeyword: $('#iptSuggestKeyword').val()
		},
		success: function(html) { jQuery('#divSuggestedCat').html(html); }
	});
}

jQuery('#iptSuggestKeyword').keydown(function(e) {
	if (e.keyCode == 13) { // enter
		e.preventDefault();
		suggestCatsFunc();
		return false;
	}
});
jQuery('#btnSearch').click(function(e) {
	e.preventDefault();
	suggestCatsFunc();
	return false;
});

jQuery('#suggested-category-grid td.button-column a').each(function (idx, a) {
	a = $(a);
	//a.click(function(e) { alert('abc'); });
	a.click(function(e) {
		e.preventDefault();
		var tds = $(this).parent().parent().find('td');
		var name = $(tds[0]);
		var path = $(tds[1]);

		$('#divParentInfo')[0].setParentCatInfo($(name.find('a')[0]).attr('rev'), path.html() + '&nbsp;&raquo;&nbsp' + name.html());

		return false;
	});
});

$('#btnChangeToRootCat').click(function (e) {
	e.preventDefault();
	$('#divParentInfo')[0].setParentCatInfo('', 'This is root category.');
	return false;
});

});
//-->
</script>