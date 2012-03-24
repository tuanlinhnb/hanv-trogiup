<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile('/css/backend.css');
$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
<div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>View Entry #<?php echo $model->id; ?></h3>
<?php
	 $parent_title = '';
	 if(!empty($model->parent))
	 	$parent_title = $model->parent->title;
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'url_key',
		array(
			'label'=>'Parent',
			'type'=>'raw',
			'value'=>$parent_title,
		),
		array(
			'label'=>'Content',
			'type'=>'raw',
			'value'=>CHtml::decode($model->content),
		),
		'active',
		'default_home',
		'created_time',
		'index',
		'last_updated_time',
	),
)); ?>
