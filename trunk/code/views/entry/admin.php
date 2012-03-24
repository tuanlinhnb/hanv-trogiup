<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile('/css/backend.css');

$this->breadcrumbs=array(
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Entry', 'url'=>array('create')),
);
?>
<div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>Manage Entries</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entry-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link($data->title, Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),
		'url_key',
 		array(
			'name'=>'parent_id',
			'value'=>'isset($data->parent)?$data->parent->title:""',
		),

		'active',
		'index',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
