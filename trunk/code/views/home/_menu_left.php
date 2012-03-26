<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile('/static/treemenu/demo.js');
	$cs->registerScriptFile('/static/treemenu/jquery.treeview.js');
	$cs->registerScriptFile('/static/treemenu/jquery.cookie.js');
	$cs->registerCssFile('/css/jquery.treeview.css');


	$ids[] = $entry->id;
	$p = $entry->parent;
	while (!empty($p)) {
		$ids[] = $p->id;
		$p = $p->parent;
	}
 ?>
<div class="main-left">
    <div class="main-left-theo-doi">
        <span><a href="#" class="main-left-theo-doi-a">LookupVietNam.vn đã tích hợp Bảo Kim</a></span>
    </div>
	<div class="main-left-content">
<ul id="navigation">
	<?php foreach($categories as $category):?>
		<li>
			<a class=" <?php if(in_array($category->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$category->url_key)) ?>"><?php echo $category->title;?></a>
            <?php if(!empty($category->entries)): ?>
				<ul class="">
				<?php foreach($category->entries as $entries):
				?>
                <li>
                 	<a class=" <?php if(in_array($entries->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$entries->url_key))?>"><?php echo $entries->title ?></a>

                 	<?php  if(!empty($entries->entries)): ?>
						<ul class="">
							<?php foreach($entries->entries as $entry_l3):
							?>
							<li class="">
    							<a class=" <?php if(in_array($entry_l3->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$entry_l3->url_key))?>"><?php echo $entry_l3->title ?></a>
							</li>
	                        <?php endforeach;?>
						</ul>
					<?php endif;?>


                </li>
            	<?php endforeach; ?>
                </ul>
			<?php endif; ?>
		</li>
 	<?php endforeach; ?>
</ul>
</div>
</div>
