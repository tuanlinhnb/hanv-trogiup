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

<?php echo $this->renderPartial('_menu_left',array('categories'=>$categories,'entry'=>$entry)) ?>
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
				<?php echo $entry->content; ?>
			</div>
		</div>
	</div>

</div>
