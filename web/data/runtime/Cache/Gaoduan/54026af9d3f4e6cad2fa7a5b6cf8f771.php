<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <title><?php echo ($post_title); ?> <?php echo ($site_name); ?> </title>
    <meta name="keywords" content="<?php echo ($post_keywords); ?>" />
    <meta name="description" content="<?php echo ($post_excerpt); ?>">
    <?php $portal_index_lastnews=13; $portal_index_dongtai=19; $portal_index_yewu=12; $portal_index_pruc=14; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"德康莱欢迎你！", "slide_pic"=>$tmpl."Public/images/demo/jiaodian02.png", "slide_url"=>"", ), array( "slide_name"=>"德康莱欢迎你", "slide_pic"=>$tmpl."Public/images/demo/jiaodian03.png", "slide_url"=>"", ), ); ?>
<meta name="author" content="ThinkCMF">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- HTML5 shim for IE8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<link rel="icon" href="/cmfx/tpl/simplebootx/Public/images/favicon.ico" mce_href="/cmfx/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/cmfx/tpl/simplebootx/Public/images/favicon.ico" mce_href="/cmfx/tpl/simplebootx/Public/images/favicon.ico" type="image/x-icon">
<link href="/cmfx/tpl/simplebootx/Public/simpleboot/themes/cmf/theme.min.css" rel="stylesheet">
<link href="/cmfx/tpl/simplebootx/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="/cmfx/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" href="/cmfx/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="/cmfx/tpl/simplebootx/Public/css/style.css" rel="stylesheet">
<style>
    /*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
    #backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
    #backtotop:hover{color:#333}
</style>
    <style>
        #article_content img{height:auto !important}
    </style>
</head>

<body class="body-white" id="top">
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="/cmfx/"><img src="/cmfx/tpl/simplebootx/Public/images/logo1.png"/></a>
       <div class="nav-collapse collapse" id="main-menu">
       	<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
		
		<ul class="nav pull-right" id="main-menu-left">
			<li class="dropdown">
			<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	            <?php if(empty($user['avatar'])): ?><img src="/cmfx/tpl/simplebootx//Public/images/headicon.png" class="headicon"/>
	            <?php else: ?>
	            <img src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
	            <?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
					<li class="divider"></li>

					<li><a href="<?php echo u('user/document/index');?>"><i class="fa fa-user"></i> &nbsp;资料中心</a></li>
					<li class="divider"></li>
	               <li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
	            </ul>
	        <?php else: ?>
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	           		<img src="/cmfx/tpl/simplebootx//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu pull-right">
	               <!--<li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li> -->
	               <li><a href="<?php echo u('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
					<!--<li class="divider"></li>
                       <li><a href="<?php echo u('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>-->
	            </ul><?php endif; ?>
          	</li>
		</ul>
		   <!--
		<div class="pull-right">
        	<form method="post" class="form-inline" action="<?php echo U('search/index');?>" style="margin:18px 0;">
				 <input type="text" class="" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
				 <input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
			</form>
		</div>
		   -->
       </div>
     </div>
   </div>
 </div>

<div class="wrap jj">
    <table border="0" cellspacing="0" cellpadding="0" style="margin:auto; width:800px; height:200px; background-color:#FFFFFF; margin-top:50px; border:2px solid #66CCFF ">
        <tr>
            <td width="800" height="38" align="center" valign="middle" bgcolor="#f3f3f3" class="font16 bold">申请高端医疗服务须知</td>
        </tr>
        <tr>
            <td width="800" valign="top" style="padding:18px 14px 14px 20px; line-height:28px" class="font14">

                <p>高端医疗服务是北京德康莱安全卫生技术发展有限公司为广大客户提供的一项增值服务，为各企业的员工及其亲属在北京三甲医院就医提供全方位服务。
                疑难重症患者挂不上对症知名专家号的难题在全国范围内均存在，这些患者或者医院蹲守数夜求号无门，或者为求一号上了票贩子的当。
                为使广大客户企业的员工能够快速就医，德康莱开通了高端医疗服务平台。</p>


                <p><b>一. 申请资格：</b>
                    <br>只有德康莱的客户企业的员工及其亲属才有资格使用高端医疗服务。申请人按要求提交申请，经德康莱审核、医生复合确认、申请人支付相关费用后，才可获得加号资格。</p>

                <p><b>二. 服务费用：</b>
                    <br>根据申请人选择的医院和医生级别的不同，服务费用会有所不同。德康莱工作人员会在与申请人确认申请信息时，告知申请人所需费用。</p>


                <p><b>三. 挂号流程按医院规定完成：</b>
                    <br>申请人通过德康莱网站获得加号资格后，到医生门诊得到该医生确认，拿到医生开具的加号单后到医院挂号室挂号，交纳医院规定的挂号费，然后返回门诊按医生门诊号序等待看病。</p>

                <p><b>四. 预约加号患者看病无任何特权：</b>
                    <br>医生对于申请人不提供任何特权，医生在看完医院正常挂号的患者后，加号患者才可按序就诊。</p>
                <p><b>五. 预约加号不占用医院正常挂号资源：</b>
                    <br>该服务提供的预约加号不属正常门诊挂号，是专家牺牲休息时间延长门诊，专门给病情需要的患者提供的就诊机会。</p>
                <p><b>六. 预约加号可能遇到的风险：</b>
                    <br>如遇医生临时停诊，德康莱会尽早通知申请人，请申请人在医院选择其他专家挂号就诊，或安排其他时间就诊。德康莱不承担任何赔偿责任。</p>
            </td>
        </tr>
        <tr>
            <td width="800" align="center" style="padding:18px 14px 14px 20px; line-height:28px" class="font14">
                <div class="bs-example" data-example-id="simple-nav-pills">
                    <ul class="nav nav-pills">

                        <li role="presentation"><a href="http://deucalion.veternal.com/cmfx/index.php?g=gaoduan&m=index&a=buss" >同意以上规定，我要申请</a></li>
                        <li role="presentation"><a href="http://deucalion.veternal.com/cmfx/" >返回主页</a></li>
                    </ul></div>

            </td>
        </tr>
    </table>

</div>

<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/cmfx/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/cmfx/statics/js/jquery.js"></script>
    <script src="/cmfx/statics/js/wind.js"></script>
    <script src="/cmfx/tpl/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/cmfx/statics/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


<script src="/cmfx/tpl/simplebootx/Public/js/slippry.min.js"></script>
<script>
    $(function() {
        var demo1 = $("#homeslider").slippry({
            transition: 'fade',
            useCSS: true,
            captions: false,
            speed: 1000,
            pause: 3000,
            auto: true,
            preload: 'visible'
        });
    });
</script>
</body>
</html>