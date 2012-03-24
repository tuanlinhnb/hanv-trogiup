<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="content-column-wrapper">
	<div class="content-column">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	</div>
	
	<div class="sidebar-column">
	<div id="sidebar">
		<?php echo $this->renderPartial('//layouts/_sidebar'); ?>
	</div><!-- sidebar --> 
	</div>
</div>
<?php $this->endContent(); ?>