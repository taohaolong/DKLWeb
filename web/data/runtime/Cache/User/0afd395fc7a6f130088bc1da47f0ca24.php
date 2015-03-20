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
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="#">
      <div class="table_list">
	    <table class="table table-hover">
	        <thead>
	          <tr>
	            <th align='center'>ID</th>
	            <th>姓名</th>
	            <th>企业名称</th>
	            <!--<th>头像</th>-->
				  <th>会员类型</th>

				  <th>E-mail</th>
	            <th>注册时间</th>
	            <th>最后登录时间</th>
	            <th>最后登录IP</th>
	            <th>状态</th>
				<th>会员详情</th>
	            <th align='center'>操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php $user_statuses=array("0"=>"已拉黑","1"=>"正常","2"=>"未验证"); ?>
	        	<?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
	            <td align='center'><?php echo ($vo["id"]); ?></td>
	            <td><?php echo ((isset($vo["user_login"]) && ($vo["user_login"] !== ""))?($vo["user_login"]):'第三方用户'); ?></td>
	            <td><?php echo ($vo["buss_name"]); ?></td>
	            <!--<td><img width="25" height="25" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>" /></td>-->

					<?php $rolename=null; ?>
					<?php if(is_array($roles)): foreach($roles as $key=>$vorole): if($vo['role_id'] == $vorole['id']) { $rolename =$vorole['name']; } endforeach; endif; ?>

					<?php if(empty($rolename)): ?><td><a href="<?php echo U('indexadmin/selectrole',array('role_id'=>$vo['role_id'],'id'=>$vo['id']));?>"  >[未设置]</a></td>

						<?php else: ?>
						<td><a href="<?php echo U('indexadmin/selectrole',array('role_id'=>$vo['role_id'],'id'=>$vo['id']));?>"  ><?php echo ($rolename); ?></a></td><?php endif; ?>


					<td><?php echo ($vo["user_email"]); ?></td>
	            <td><?php echo ($vo["create_time"]); ?></td>
	            <td><?php echo ($vo["last_login_time"]); ?></td>
	            <td><?php echo ($vo["last_login_ip"]); ?></td>
	            <td><?php echo ($user_statuses[$vo['user_status']]); ?></td>
				<!-- <a href="javascript:open_iframe_dialog('<?php echo u('indexadmin/buss',array('id'=>$vo['id']));?>','评论列表')">查看评论</a> |
 -->
					<td><a href="javascript:open_iframe_dialog('<?php echo U('indexadmin/buss',array('id'=>$vo['id']));?>','会员企业信息详情')" >查看</a>|<a href="<?php echo u('indexadmin/bussedit',array('id'=>$vo['id']));?>" >修改</a></td>
	             <td align='center'>
		            <a href="<?php echo U('indexadmin/ban',array('id'=>$vo['id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要拉黑此用户吗？">拉黑</a>|
					 <a href="<?php echo U('indexadmin/cancelban',array('id'=>$vo['id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要启用此用户吗？">启用</a>
		        </td>
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