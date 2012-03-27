<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile('/css/backend.css');

	$this->breadcrumbs = array();
	$p = $model->parent;
	while (!empty($p)) {
		$this->breadcrumbs[$p->title] = array('entry/view','id'=>$p->id);
		$p = $p->parent;
	}
	$breadcrubs = array_reverse($this->breadcrumbs);
	$breadcrubs[] = $model->title;

	$array1 = array(
		'Manage'=>array('admin'),
	);
	$this->breadcrumbs   =array_merge($array1, $breadcrubs);

//$this->breadcrumbs=array(
//	'Manage'=>array('admin'),
//	$model->title,
//);

$this->menu=array(
	array('label'=>'Create SubEntry', 'url'=>array('create','pid'=>$model->id)),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
<div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>View Entry "<?php echo $model->title; ?>"</h3>
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

<?php if (!empty($model->entries)): ?>
	<h2 style="margin:20px 0 -20px 0">Children Entry</h2>
	<?php echo $this->renderPartial('_children', array(
		'model'=>$model,
	));
	endif; ?>
