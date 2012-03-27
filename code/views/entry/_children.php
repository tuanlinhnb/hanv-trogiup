<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entry-grid',
	'dataProvider'=>$model->getChildren(),
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