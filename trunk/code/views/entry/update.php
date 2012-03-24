<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile('/css/backend.css');
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'View Entry', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
 <div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>Update Entry <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
    'parentModel'	=>	$parentModel,
	'fModel'	=>	$fModel,
	)); ?>