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
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#B"  target="_self">会员基本信息</a></li>

        <li ><a href="<?php echo U('Admin/newpatient');?>" target="_self">就医需求审核列表</a></li>

    </ul>
    <div class="common-form">
        <form method="post" class="J_ajaxForm" action="#">
            <div class="table_list">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th align='center'>ID</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <!--<th>头像</th>-->
                        <th>出生日期</th>
                        <th>身份证号</th>
                        <th>E-mail</th>
                        <th>单位名称及编号</th>
                        <th>住址</th>
                        <th>微信</th>
                        <th>QQ</th>

                        <th align='center'>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
                            <td align='center'><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ((isset($vo["user_name"]) && ($vo["user_name"] !== ""))?($vo["user_name"]):'第三方用户'); ?></td>

                            <!--<td><img width="25" height="25" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>" /></td>-->

                          <td><?php echo ($vo["sex"]); ?></td>
                            <td><?php echo ($vo["birthday"]); ?></td>
                            <td><?php echo ($vo["cardID"]); ?></td>
                            <td><?php echo ($vo["user_email"]); ?></td>
                            <td><?php echo ($vo["buss_name"]); ?></td>
                            <td><?php echo ($vo["user_address"]); ?></td>

                            <td><?php echo ($vo["user_weichat"]); ?></td>
                            <td><?php echo ($vo["user_QQ"]); ?></td>
                            <td><a href="javascript:open_iframe_dialog('<?php echo U('Admin/patientinfo',array('gaouserid'=>$vo['id']));?>','就医需求')" >
                                查看就医信息</a>


                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                <div class="pagination"><?php echo ($page); ?></div>
            </div>
        </form>
    </div>
</div>
<script src="/cmfx/statics/js/common.js"></script>
<script>
</script>
</body>
</html>