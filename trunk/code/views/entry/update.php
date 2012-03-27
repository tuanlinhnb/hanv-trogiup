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

//	$this->breadcrumbs=array(
//	'Manage'=>array('admin'),
//	$model->title=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'View Entry', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
 <div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>Update Entry "<?php echo $model->title; ?>"</h3>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
    'parentModel'	=>	$parentModel,
	'fModel'	=>	$fModel,
	)); ?>