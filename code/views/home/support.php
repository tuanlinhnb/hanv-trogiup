<style type="text/css" charset="utf-8">

#Page-wide {
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #C4C9CB #C4C9CB #006C9A;
    border-radius: 5px 5px 5px 5px;
    border-style: solid;
    border-width: 1px 1px 4px;
    box-shadow: 0 0 6px 0 #C4C9CB;
    font-family: Tahoma,Geneva,sans-serif;
    height: 236px;
    width: 730px;
}
.head-support {
    font-size: 11px;
    line-height: 22px;
}
.time-support {
    border-bottom: 1px dashed #CCCCCC;
    border-top: 1px dashed #CCCCCC;
    clear: both;
    font-size: 12px;
    margin-top: 15px;
}
.time-support-content {
    background: none repeat scroll 0 0 #E4EFD9;
    height: 46px;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-top: 5px;
    width: 719px;
}
.time-support-content-show {
    line-height: 24px;
    margin-left: 16px;
}
.place-support {
    border-bottom: 2px solid #EEEEEE;
    color: #666666;
    font-size: 12px;
    line-height: 24px;
    margin: 16px 15px 0 21px;
    padding-bottom: 16px;
}
.nick-support {
    color: #006C9A;
    font-size: 12px;
    line-height: 24px;
    margin-top: 10px;
}
.hotro-left {
    float: left;
}
.ho-tro-yahoo {
    background: url("<?php echo Yii::app()->request->baseUrl; ?>/css/images/allStar.png") no-repeat scroll -6px -152px transparent;
    padding-left: 25px;
}
.ho-tro-skype {
    background: url("<?php echo Yii::app()->request->baseUrl; ?>/css/images/allStar.png") no-repeat scroll -7px -128px transparent;
    padding-left: 25px;
}
.ho-tro-phone {
    background: url("<?php echo Yii::app()->request->baseUrl; ?>/css/images/allStar.png") no-repeat scroll -7px -106px transparent;
    padding-left: 25px;
}
.span_githe{
	float:right; background:url(<?php echo Yii::app()->request->baseUrl; ?>/css/images/allStar.png) -5px -79px no-repeat; width:19px; height:19px; margin:3px
}

</style>
<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/support.css');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/drop_Down_style.css');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/colorbox.css');
 ?>
<div id="Page-wide">
    <div class="head-support">
    <!--	<span style="float:left; color:#ff0000; margin-top:0px; margin-left:5px"><b>X</b> Đóng</span>  -->
        <span class="span_githe"></span>
        <span style="float:right; color:#333333; padding-right:3px">Hỗ trợ trực tuyến</span>
    </div>
    <div class="time-support">
    	<div class="time-support-content">
            <div class="time-support-content-show">
                <span>Thời gian: <span style="color:#006c9a">Tất cả các ngày trong tuần</span> 08h00 -12h00 và 13h30 - 17h30</span><br>
                <span><span style="color:#ff0000">Ngoài giờ hành chính:</span> Vui lòng gửi liên hệ tới chúng tôi 0988 948 550 <span style="color:#006c9a">(Email: support@baokim.vn)</span></span>
            </div>
        </div>
    </div>
    <div class="place-support">
    	<span>VĂN PHÒNG HÀ NỘI (Hotline: 0988 948 550)</span><br>
        <span>VĂN PHÒNG TP.HỒ CHÍ MINH (Hotline: 0983 529 000)</span>
    </div>
    <div class="nick-support">
        	<table width="695" cellspacing="0" cellpadding="0" border="0">
                  <tbody><tr>
                        <td><span style="font-weight:bold; margin-left:22px">Hỗ trợ chung</span></td>
                        <td><span style="font-weight:bold">Hỗ trợ nghiệp vụ</span></td>
                        <td><span style="font-weight:bold">Hỗ trợ tích hợp</span></td>
                  </tr>
                  <tr>
                        <td><span class="ho-tro-phone" style="margin-left:22px">043 9785 411 (Ext: 0-15) </span></td>
                        <td><span class="ho-tro-phone">043 9785 414 (Ext: 11-20)</span></td>
                        <td><span class="ho-tro-phone">043 9785 414 (Ext: 0)</span></td>
                  </tr>
            </tbody></table>

    </div>
</div>