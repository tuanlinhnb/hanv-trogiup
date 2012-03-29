<?php
	$this->breadcrumbs = array();
	$p = $entry->parent;
	while (!empty($p)) {
		$this->breadcrumbs[$p->title] = array('index','url_key'=>$p->url_key);
		$p = $p->parent;
	}
	$breadcrubs = array_reverse($this->breadcrumbs);
	$breadcrubs[] = $entry->title;
	$this->breadcrumbs   = $breadcrubs;
?>

<?php
	if ($this->beginCache('menu_left_'.$entry->id, array(
	'duration'	=>	24*3600,
	'dependency'=>	array(
		'class'	=>	'CDbCacheDependency',
		'sql'	=>	'SELECT MAX(`last_updated_time`) FROM entry',
	)
	))) {
		echo $this->renderPartial('_menu_left',array('categories'=>$this->categories,'entry'=>$entry));
		$this->endCache();
	}

?>

<div class="main-right">
	<div class="line-link">

		<?php if(isset($this->breadcrumbs)):?>
		<?php
				$this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>array_merge(array('Trang chủ'=>array('home/'),), $this->breadcrumbs),
					'separator'=>'<span class="separator"></span>',
					'homeLink'=>false,
				)); ?>
		<?php endif?>

	<div>
	<hr style="color:#006c9a;border: 1px solid;   float: left;  margin: 1px 0">
	</div>

	</div>
	<div class="boxLeft">
		<div id="LgArticle">
			<div class="main-right-home">

			 <?php
	if ($this->beginCache('conten_right_'.$entry->id, array(
	'duration'	=>	24*3600,
	'dependency'=>	array(
		'class'	=>	'CDbCacheDependency',
		'sql'	=>	'SELECT last_updated_time FROM entry where id = '.$entry->id,
	)
	))) {
		echo $entry->content;
		$this->endCache();
	}

?>
			</div>
		</div>
	</div>

</div>
