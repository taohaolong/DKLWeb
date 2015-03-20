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
        <li class="active"><a href="#b"  target="_self">所有医院</a></li>

        <li ><a href="<?php echo U('Admin/hospital');?>" target="_self">添加医院</a></li>
        <li><a href="<?php echo U('Admin/addclinic');?>"  target="_self">添加科室</a></li>
        <li><a href="<?php echo U('Admin/listdoctor');?>"  target="_self">医生类型管理</a></li>

    </ul>
    <form class="J_ajaxForm" action="" method="post">
        <div class="table_list">
            <table width="100%" class="table table-hover">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>医院名称</th>
                    <th>医院网址</th>

                    <!--<th>操作</th>-->
                    <!--<th width="45">点击量</th>
                    <th width="50">摘要</th>
                    <th width="50">缩略图</th>
                    <th width="80">发布人</th>
                    <th width="120"><span>发布时间</span></th>
                    <th width="45">状态</th>
                    <th width="120">操作</th>-->
                </tr>
                </thead>

                <?php if(is_array($listhos)): foreach($listhos as $key=>$vo): ?><tr>
                        <td><a><?php echo ($vo["id"]); ?></a></td>
                        <td>

                                <span><?php echo ($vo["hospital_name"]); ?></span>

                        </td>
                        <td><?php echo ($vo["hospital_url"]); ?></td>
                        <td>
                        <td><a href="javascript:open_iframe_dialog('<?php echo U('Admin/listclinic',array('hosid'=>$vo['id']));?>','科室列表')" >查看科室</a>|
                            <a href="<?php echo U('Admin/edit',array('id'=>$vo['id']));?>">修改</a>|
                            <a href="<?php echo U('Admin/delete',array('id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
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