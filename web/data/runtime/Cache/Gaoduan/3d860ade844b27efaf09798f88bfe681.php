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

<body onload="init();" class="body-white J_scroll_fixed">
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

<div class="wrap J_check_wrap">

    <div class="row">
        <div class="span2">

        </div>

        <div class="span10">
            <div class="common-form">

        <!--<form class="form-inline" class="form-horizontal" method="post" action="#">-->
        <form class="form-horizontal J_ajaxForm" name="myform" id="myform" action="<?php echo u('Index/finish');?>" method="post">
            <input type="hidden" name="gaouserid" value="<?php echo ($id); ?>"/>
            <input type="hidden"  name="user_name" value="<?php echo ($user_name); ?>"/>

            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table mb40">
                        <tbody>

                        <tr>
                            <td><label>姓名</label></td><td><?php echo ($user_name); ?><td>
                            <td><label>性别</label></td><td>
                            <?php $sexs=array("0"=>"保密","1"=>"男","2"=>"女"); ?>
                            <?php echo ($sexs[$sex]); ?>

                        </td>
                            <td><label>出生日期</label></td><td><?php echo ($birthday); ?></td>
                            <td><label>身份证号</label></td> <td><?php echo ($cardID); ?></td>
                        </tr>
                        <tr>
                            <td><label>单位编号</label></td><td><?php echo ($buss_num); ?><td>
                            <td><label>联系电话</label></td><td><?php echo ($user_tel); ?></td>
                            <td><label>住址</label></td><td><?php echo ($user_address); ?></td>
                            <td><label>电子邮件</label></td> <td><?php echo ($user_email); ?></td>
                        </tr>
                        <tr>
                            <td><label>QQ</label></td><td><?php echo ($user_QQ); ?><td>
                            <td><label>微信</label></td><td><?php echo ($user_weichat); ?></td>

                            <td></td><td></td>    <td></td><td></td>
                        </tr>

                        <tr>
                            <td><label>服务选择</label></td>
                            <td><?php $servers=array("1"=>"本地就医","2"=>"快速检查(建设中)","4"=>"专家会诊(建设中)", "3"=>"快速住院(建设中)","5"=>"快速手术(建设中)"); ?>
                                <select style="WIDTH: 120px" id="input-svr" name="svr">
                                    <?php if(is_array($servers)): foreach($servers as $key=>$vo): $sexselected=$key==$svr?"selected":""; ?>
                                        <option value="<?php echo ($key); ?>" <?php echo ($sexselected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                                </select>
                            </td>
                            <td>医院</td>
                            <td>
                                <select style="WIDTH: 120px" name="hospital_name"  class="normal_select">
                                    <?php if(is_array($hospitalvar)): foreach($hospitalvar as $key=>$vo): ?><option value="<?php echo ($vo["hospital_name"]); ?>"><?php echo ($vo["hospital_name"]); ?></option><?php endforeach; endif; ?>

                                </select>
                            </td>

                            <td>科室</td>
                            <td>

                                <select style="WIDTH: 120px" name="clinic_name"  class="normal_select">
                                    <?php if(is_array($clinicvar)): foreach($clinicvar as $key=>$vo): ?><option value="<?php echo ($vo["clinic_name"]); ?>"><?php echo ($vo["clinic_name"]); ?></option><?php endforeach; endif; ?>

                                </select>

                            </td>

                            <td>医生</td>
                            <td>
                                <select style="WIDTH: 120px" name="doctor_type"  class="normal_select">
                                    <?php if(is_array($doctorvar)): foreach($doctorvar as $key=>$vo): ?><option value="<?php echo ($vo["doctor_type"]); ?>"><?php echo ($vo["doctor_type"]); ?></option><?php endforeach; endif; ?>

                                </select>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div><!-- panel-body -->

            <div class="panel-footer">
                <button class="btn btn-primary">完成</button>

            </div>
        </form>
</div>
            </div>


    </div>
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