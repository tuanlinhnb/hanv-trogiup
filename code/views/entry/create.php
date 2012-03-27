<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile('/css/backend.css');

if ($parentModel)
	$this->breadcrumbs=array(
		'Manage'=>array('admin'),
		$parentModel->title	=>	array('view', 'id'=>$parentModel->id),
		'Create',
	);
else
	$this->breadcrumbs=array(
		'Manage'=>array('admin'),
		'Create',
	);

$this->menu=array(
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
<div class="breadcrumbs_admin"><?php echo $this->renderPartial('_breadcrumbs') ?></div>
<h3>Create Entry</h3>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
    'parentModel'	=>	$parentModel,
	'fModel'	=>	$fModel,
	)); ?>