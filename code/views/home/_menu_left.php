<?php
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
        <ul class="ul-menu level-1">
        	<?php foreach($categories as $category):?>
        		<li>
              	  <a class="menu_1 <?php if(in_array($category->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$category->url_key)) ?>"><?php echo $category->title;?></a>
				  <?php if(!empty($category->entries)): ?>
					<ul class="ul-menu level-2">
					<?php foreach($category->entries as $entries):
						if(in_array($category->id,$ids)):
					?>
						<li class="menu_category">
					    <a class="menu_2 <?php if(in_array($entries->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$entries->url_key))?>"><?php echo $entries->title ?></a>
							<?php  if(!empty($entries->entries)): ?>
								<?php foreach($entries->entries as $entry_l3):
										if(in_array($entries->id,$ids)):
								?>
									<ul class="ul-menu level-3">
									<li class="menu_category">
    									<a class="menu_3 <?php if(in_array($entry_l3->id,$ids)) echo 'active1';?>" href="<?php echo $this->createUrl('index',array('url_key'=>$entry_l3->url_key))?>"><?php echo $entry_l3->title ?></a>
									</li>

									</ul>
								<?php endif; endforeach; ?>
							<?php endif; ?>
						</li>
					<?php endif; endforeach; ?>
					<?php endif; ?>
					</ul>
            	</li>
        	<?php endforeach; ?>
        </ul>
    </div>
</div>

