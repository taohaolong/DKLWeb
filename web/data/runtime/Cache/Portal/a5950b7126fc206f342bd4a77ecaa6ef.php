<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html>
	<head>
		<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
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
		<link href="/cmfx/tpl/simplebootx/Public/css/slippry/slippry.css" rel="stylesheet">
		<style>
			.caption-wraper{position: absolute;left:50%;bottom:2em;}
			.caption-wraper .caption{
			position: relative;left:-50%;
			background-color: rgba(0, 0, 0, 0.54);
			padding: 0.4em 1em;
			color:#fff;
			-webkit-border-radius: 1.2em;
			-moz-border-radius: 1.2em;
			-ms-border-radius: 1.2em;
			-o-border-radius: 1.2em;
			border-radius: 1.2em;
			}
			@media (max-width: 767px){
				.sy-box{margin: 12px -20px 0 -20px;}
				.caption-wraper{left:0;bottom: 0.4em;}
				.caption-wraper .caption{
				left: 0;
				padding: 0.2em 0.4em;
				font-size: 0.92em;
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				-ms-border-radius: 0;
				-o-border-radius: 0;
				border-radius: 0;}
			}
		</style>
	</head>
<body class="body-white">
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

<?php $home_slides=sp_getslide("portal_index"); $home_slides=empty($home_slides)?$default_home_slides:$home_slides; ?>
<ul id="homeslider" class="unstyled">
	<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
		<div class="caption-wraper">
			<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
		</div>
		<a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
	</li><?php endforeach; endif; ?>
</ul>
<div class="container">
	
	<div>
		<h1 class="text-center">北京德康莱安全卫生技术发展有限公司</h1>

	</div>



	<div class="row">
		<div class="span4">
			<h2 class="font-large nospace "><i class="fa fa-bars"></i> 公司简介</h2>
			<p>北京德康莱安全卫生技术发展有限公司成立于2005年，作为专业的职业卫生技术服务机构，我公司在积极开展 “职业病有害因素检测” 和 “建设项目职业病危害评价” 工作的同时，也非常重视安全职业卫生知识的培训，针对不同性质的企业和劳动者，提供与之相适应的安全职业卫生管理体系和丰富多彩的培训服务，在众多企业客户中树立了良好的品牌形象。随着业务的持续发展，我院将进一步壮大专业技术服务队伍，以高效优质的工作服务于安全职业卫生市场，以满足客户更多层次的需要。</p>
		</div>

		<div class="span4">
			<h2 class="font-large nospace"><i class="fa  fa-lightbulb-o"></i> 公司动态</h2>
			<?php $lastdongtai=sp_sql_posts("cid:$portal_index_dongtai;field:post_title,post_date,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
			<?php if(is_array($lastdongtai)): foreach($lastdongtai as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
			<dl>
				<dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></dt>
				<!--<dd>[<?php echo ($vo["post_date"]); ?>]</dd>-->
			</dl><?php endforeach; endif; ?>

		</div>

		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-newspaper-o"></i> 公司业务</h2>
			<p>我公司2010年9月取得了北京市质量技术监督局《资质认定计量认证证书》；2010年10月获得北京市卫生局《北京市职业卫生技术机构（建设项目职业病危害评价、职业病危害因素检测）》资质，公司积极开展了“职业病有害因素检测”和“建设项目职业病危害评价”工作。
与此同时，本公司非常重视安全职业卫生知识的培训，针对不同性质的企业和劳动者，帮助建立适宜的安全职业卫生管理体系，提供丰富多彩的培训服务，树立良好的品牌形象。</p>
		</div>

	</div>


	<div class="row">
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa  fa-lightbulb-o"></i> 经营业务</h2>

        	<?php $lastyewu=sp_sql_posts("cid:$portal_index_yewu;field:post_title,post_date,post_excerpt,tid,smeta;order:listorder asc;limit:5;"); ?>
			<?php if(is_array($lastyewu)): foreach($lastyewu as $key=>$vo): ?><dl >
					<dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></dt>
					<!--<dd>[<?php echo ($vo["post_date"]); ?>]</dd>-->
				</dl><?php endforeach; endif; ?>


		</div>
		<div class="span4 ">
		<h2 class="font-large nospace"><i class="fa fa-cubes"></i> 公司产品</h2>

			<?php $lastyewu=sp_sql_posts("cid:$portal_index_pruc;field:post_title,post_date,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
			<?php if(is_array($lastyewu)): foreach($lastyewu as $key=>$vo): ?><dl >
					<dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></dt>
					<!--<dd>[<?php echo ($vo["post_date"]); ?>]</dd>-->
				</dl><?php endforeach; endif; ?>


		</div>
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-glass"></i> 实验环境</h2>
			<?php $lastyewu=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_date,post_excerpt,tid,smeta;order:listorder asc;limit:5;"); ?>
			<?php if(is_array($lastyewu)): foreach($lastyewu as $key=>$vo): ?><dl >
					<dt><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></dt>
					               
					<!--<dd>[<?php echo ($vo["post_date"]); ?>]</dd>-->
				</dl><?php endforeach; endif; ?>

		</div>
	</div>
	<!--
    <div>
        <h1 class="text-center">最新新闻</h1>

    </div>
    <?php $lastnews=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
    <div class="row">
        <?php if(is_array($lastnews)): foreach($lastnews as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
        <div class="span3">
            <div class="tc-gridbox">
                <div class="header">
                    <div class="item-image">
                        <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>">
                            <?php if(empty($smeta['thumb'])): ?><img src="/cmfx/tpl/simplebootx/Public/images/default_tupian1.png" class="img-responsive" alt="<?php echo ($vo["post_title"]); ?>"/>
                            <?php else: ?>
                                <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" class="img-responsive img-thumbnail" alt="<?php echo ($vo["post_title"]); ?>" /><?php endif; ?>
                        </a>
                    </div>
					<h3><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h3>
					
				</div>
				<div class="body">
					<p><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo msubstr($vo['post_excerpt'],0,32);?></a></p>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
	</div>-->
<br><br><br>
<!-- Footer
      ================================================== -->
      <hr>

      <div id="footer">
        <div class="links">
        <?php $links=sp_getlinks(); ?>
        <?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endforeach; endif; ?>
        </div>
        <p>
            Copyright (c) 2005-2015 Deucalion(Beijing) Co., Ltd. All Rights Reserved.<br/>

        </p>
      </div>
      <div id="backtotop"><i class="fa fa-arrow-circle-up"></i></div>
      <?php echo ($site_tongji); ?>

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