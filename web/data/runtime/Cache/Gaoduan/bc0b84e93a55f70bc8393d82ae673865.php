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
        <li ><a href="<?php echo U('Admin/meminfo');?>"  target="_self">会员基本信息</a></li>

        <li class="active"><a href="#" target="_self">就医需求审核列表</a></li>

    </ul>
    <form class="J_ajaxForm" action="" method="post">
        <div class="table_list">
            <table width="100%" class="table table-hover">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>会员ID</th>

                    <th>医院</th>
                    <th>科室</th>
                    <th>医生种类</th>

                    <!--<th>操作</th>-->
                    <!--<th width="45">点击量</th>
                    <th width="50">摘要</th>
                    <th width="50">缩略图</th>
                    <th width="80">发布人</th>
                    <th width="120"><span>发布时间</span></th>
                    <th width="45">状态</th>-->
                    <th width="120">操作</th>
                </tr>
                </thead>
                <?php $status=array("1"=>"已审核","0"=>"未审核"); ?>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["id"]); ?></a></td>
                        <td><?php echo ($vo["gaouserid"]); ?></td>

                        <td>

                                <span><?php echo ($vo["hospital_name"]); ?></span>

                        </td>
                        <td><?php echo ($vo["clinic_name"]); ?></td>

                        <td><?php echo ($vo["doctor_type"]); ?></td>
                        <td align='center'>
                        <a href="<?php echo U('Admin/ban',array('id'=>$vo['id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要审核通过此用户吗？"><?php echo ($status[$vo['auth']]); ?></a>
                        </td>


                    </tr><?php endforeach; endif; ?>
            </table>
            <div class="pagination"><?php echo ($Page); ?></div>

        </div><!--
        <div class="form-actions">
            <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/listorders');?>">排序</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/check',array('check'=>1));?>" data-subcheck="true" >审核</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/check',array('uncheck'=>1));?>" data-subcheck="true" >取消审核</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/top',array('top'=>1));?>" data-subcheck="true" >置顶</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/top',array('untop'=>1));?>" data-subcheck="true" >取消置顶</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/recommend',array('recommend'=>1));?>" data-subcheck="true" >推荐</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/recommend',array('unrecommend'=>1));?>" data-subcheck="true" >取消推荐</button>
            <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/delete');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
            <button class="btn btn-primary" type="button" id="J_Content_remove">批量移动</button>
        </div>-->
    </form>
</div>
<script type="text/javascript" src="/cmfx/statics/js/common.js"></script>
</body>
</html>