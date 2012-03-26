<div class="category_select" id="catsWrapper">
	<div class="select_category_message">
		<ul id="selectedCats">
       		<li>
       		</li>
		</ul>
	</div>
	<div style="clear:both"></div>
</div>
<script language="JavaScript">
<!--
CatSelector = {
	data: {},
	options: {},

	clearSelectedCats: function(level) {
		var opts = $('#selectedCats li');
		for (var i=level-1;i<opts.length;i++) $(opts[i]).remove();
	},

	onSelectChange: function(e) {
		var label = $(this).find('.open');
		if(label.length != 0){
           	opt = label.parent();
		   	var level = $(this).data('level');
			var cat = opt.data('cat');

			CatSelector.clearSelectedCats(level);

			if (cat.children.length) CatSelector.refresh(level+1, cat.children);
		}

		var label = $(this).find('.close');
		if(label.length != 0){
           	opt = label.parent();
           	var level = $(this).data('level');
           	alert(level);
//        	CatSelector.clearSelectedCats(level-1);
		}
	},

	refresh: function(level, cats) {
//   		CatSelector.removeContButton();

		var wr = $('#catsWrapper');
		var sCats = $('#selectedCats');

		CatSelector.clearSelectedCats(level);

		for (var i=level; i<10; i++) wr.find('#cat-level-' + i).remove();

		var div = jQuery('<div/>', {
			class: "fl",
			id: "cat-level-" + level
		});

		div.html('<div class="combobox"><label class="icon"></label></div>');

		wr.append(div);

		var sel = jQuery('<ul/>', {
			size: 15,
			class: "raovat_control"
		});
		div.find('.combobox').append(sel);
		sel.data('level', level);

		sel.click(this.onSelectChange);

		for (var i=0;i<cats.length;i++) {
			var cat = cats[i];

			var opt = jQuery('<li/>', {
				value: cat.id
			});
			opt.html('<label class="close">>></label>'+cat.title);
			opt.appendTo(sel);
			opt.data('cat', cat);
		}
	}
}

CatSelector.data = jQuery.parseJSON("<?php echo CJavaScript::quote(json_encode($categories)); ?>");
CatSelector.refresh(1, CatSelector.data);
 $(".close").click(function() {
	 $(".open").removeClass('open');
	 $(this).removeClass('close');
	 $(this).addClass('open');
});
 $(".open").click(function() {
	 $(this).removeClass('open');
	 $(this).addClass('close');
});
-->
</script>
<div id="continue"></div>
