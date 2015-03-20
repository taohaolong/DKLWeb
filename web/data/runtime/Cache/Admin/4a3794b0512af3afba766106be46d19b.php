<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/cmfx/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/cmfx/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/cmfx/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/cmfx/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/cmfx/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
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
    <script src="/cmfx/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap jj">
	<ul class="nav nav-tabs">
     <li class="active"><a href="#" data-toggle="tab">SMTP配置</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Admin/mailer/index_post');?>">
	    <table cellpadding="2" cellspacing="2">
	        <tbody>
	        	<tr>
	        		<td width="100">邮箱地址:</td>
	        		<td>
	        			<input type="text" class="input mr5" name="address" value="<?php echo (C("SP_MAIL_ADDRESS")); ?>" />
	        			<span class="must_red">*</span>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>SMTP服务器:</td>
	        		<td>
	        			<input type="text" class="input mr5" name="smtp" value="<?php echo (C("SP_MAIL_SMTP")); ?>" />
	        			<span class="must_red">*</span>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>邮箱登录帐号:</td>
	        		<td>
	        			<input type="text" class="input mr5" name="loginname" value="<?php echo (C("SP_MAIL_LOGINNAME")); ?>" />
	        			<span class="must_red">*</span>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>邮箱登录密码:</td>
	        		<td>
	        			<input type="password" class="input mr5" name="password" value="<?php echo (C("SP_MAIL_PASSWORD")); ?>" />
	        			<span class="must_red">*</span>
	        		</td>
	        	</tr>
			</tbody>
	    </table>
  		<div class="form-actions">
            <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">确定</button>
       </div>
    </form>
  </div>
</div>
<script src="/cmfx/statics/js/common.js"></script>

</body>
</html>