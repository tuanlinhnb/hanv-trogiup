<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/drop_Down_style.css" />
	<?php  Yii::app()->clientScript->registerCoreScript('jquery.ui');?>
	<?php  Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/jquery/jquery_001.js');?>
	<?php  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/jquery/dropDown.js');?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

<body>
<div style="display: none;" id="cboxOverlay"></div><div style="padding-bottom: 0px; padding-right: 0px; display: none;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0pt; height: 0pt; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>

<div class="container" id="page">

	<div id="header">
 		<div id="Menu">
   			 <div id="Page-wide">
        	 	<div class="menu-content">
        		<ul class="menu-content-ul">
		            <li><a href="https://www.baokim.vn/">Trang chủ</a></li>
		            <li><a href="https://www.baokim.vn/service">Dịch vụ</a></li>
		            <li><a href="https://www.baokim.vn/payment/integrate_button/intro_view">Tích hợp thanh toán</a></li>
		            <li><a href="http://shopping.baokim.vn/home/">Shopping</a></li>
		            <li><a href="https://www.baokim.vn/news">Tin tức</a></li>
		            <li><a href="https://www.baokim.vn/faq">Trợ giúp</a></li>
					<!--<li><a  class="logged-head" href="#">datbt@baokim.vn</a></li> -->
					<li style="float:right;"><a href="https://www.baokim.vn/accounts/register">Đăng ký</a></li>
					<li style="float:right;margin-top:2px"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baokim_tichhopthanhtoan_03.jpg"></li>
					<li style="float:right;"><a href="https://www.baokim.vn/accounts/login">Đăng nhập</a></li>

		        </ul>
        </div>
    	</div>
	</div>
	</div><!-- header -->
	<div id="Header-back-full">
	<div id="Page-wide">
	<div id="Header"><!--Header -->
    	<div class="logo"></div>
        <div class="quang-cao">
        	<img border="0" style="width:468px; height:60px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/1323749775banner_03.png">
        </div><!--quang-cao -->
        <div class="icon-header">
        	<a target="_blank" href="http://www.facebook.com/baokimjsc"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baokim_tichhopthanhtoan_12.jpg"></a>
			<a target="_blank" href="https://plus.google.com/u/0/100199626699504237495/posts"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baokim_tichhopthanhtoan_10.jpg"></a>
            <a target="_blank" href="http://www.youtube.com/user/Baokimjsc"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baokim_tichhopthanhtoan_14.jpg"></a>
        </div>
        <div class="ho-tro">
        	<a href="<?php echo $this->createUrl('home/support') ?>" class="iframe cboxElement" style="text-decoration:none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baokim_tichhopthanhtoan_20a_03.jpg"></a>

        </div>

 		</div>
    </div><!--Header end-->
	</div>
	<div style="clear: both;"></div>
<div id="main">
	<div class="main-content">
		<?php echo $content; ?>
	</div>
	<div class="menu-footer">
        	<ul class="menu-footer-ul">
            	<li><a href="https://www.baokim.vn/">Trang chủ</a></li>
                <li><a href="https://www.baokim.vn/intro">Giới thiệu</a></li>
                <li><a href="https://www.baokim.vn/privacy_policy">Chính sách bảo mật</a></li>
                <li><a href="https://www.baokim.vn/user_agreement">Quy định sử dụng</a></li>
                <li><a href="https://www.baokim.vn/faq">Trợ giúp</a></li>
				<li><a href="https://www.baokim.vn/contact">Liên hệ</a></li>
            </ul>
    </div>
</div>


<div id="Footer-back">
		<div id="Footer-khung">
		    <div id="Footer">
		    	<div class="footer-left">
		        	<span>Bản quyền &copy;2011 thuộc về công ty cổ phần thương mại điện tử Bảo Kim</span><br>
		            <span>Bảo Kim dịch vụ thanh toán trực tuyến, thúc đẩy thương mại điện tử Việt Nam</span><br>
		            <span>Giấy phép ĐKKD:0104432131. Cấp tại Sở kế hoạch và đầu tư Hà Nội. Ngày cấp 08/02/2010</span>
		        </div>
		        <div class="footer-right">
		        	<span>Trụ sở tầng 7, 51 Lê Đại Hành, Hai Bà Trưng, Hà Nội</span><br>
		            <span>VP TP.HCM: Lầu 10 tòa nhà Mekong Tower, 235 Cộng Hòa F.13</span><br>
		            <span>Q.Tân Bình, TP.Hồ Chí Minh</span>
		        </div>
		    </div>
	    </div>
	</div><!-- footer -->

</div><!-- page -->
		<script type="text/javascript">
			$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$(".iframe").colorbox({iframe:true, width:"810px", height:"325px"});

		});
		</script>
</body>
</html>
