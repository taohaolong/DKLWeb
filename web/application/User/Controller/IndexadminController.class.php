<?php

/**
 * 会员
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController {


    function index(){
    	$users_model=M("Users");
		$role_obj= M("Role");
		$roles=$role_obj->where("status=1")->select();
		$this->assign("roles",$roles);


		$count=$users_model->where(array("user_type"=>2))->count();
    	$page = $this->page($count, 20);
    	$lists = $users_model
		//	->alias("a")->join(C ( 'DB_PREFIX' )."role b ON  b.id = a.role_id")
    	->where(array("user_type"=>2))
    	->order("create_time DESC")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	$this->assign('lists', $lists);
    	$this->assign("page", $page->show('Admin'));

    	$this->display(":index");
    }
    
    function ban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','0');
    		if ($rst) {
    			$this->success("会员拉黑成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员拉黑失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }

	/**
	 * 重新设置会员类型
	 */
	function setrole()
	{
		$usrid =intval($_GET['usrid']);
        $role_id = $_POST['role_id'];

		if ($role_id) {
			$rst = M("Users")->where(array("id"=>$usrid,"user_type"=>2))->setField('role_id',$role_id);
			if ($rst) {
				$this->success("会员类型更改成功！", U("indexadmin/index"));
			} else {
				$this->error('会员类型未更改或更改失败！');
			}
		} else {
			$this->error('数据传入失败！');
		}

	}

	/**
	 *
	 * 会员角色选择页面
	 */
	function selectrole()
	{
		$id =intval($_GET['id']);
		$role_id = intval($_GET['role_id']);

		if($id)
		{
			$map['id' ] = array('neq' , 1);
			$rst = M("Role")->where($map)->select();
            $rusr = M("Users")->where(array("id"=>$id))->select();
			$username = $rusr[0]["user_login"];
			$this->assign("loginname",$username);
			$this->assign("role_id",$role_id);
			$this->assign("usrid",$id);
			$this->assign("roles",$rst);



		}
		$this->display();
	}

    function cancelban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','1');
    		if ($rst) {
    			$this->success("会员启用成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
			$this->error('数据传入失败！');
		}
	}
	function buss()
	{
		$id=intval($_GET['id']);
		$users_model=D("Common/Users");

		$user=$users_model->where(array("id"=>$id))->find();
		$this->assign($user);
		//$this->display();
		$this->display();

	}

	/**
	 * 会员资料填写/修改
	 */
	function bussedit()
	{
		$id=intval($_GET['id']);
		$users_model=D("Common/Users");

		$user=$users_model->where(array("id"=>$id))->find();
		$this->assign($user);
		//$this->display();
		$this->display();

	}

	function bussedit_post(){

		$users_model=D("Common/Users");
		$id=intval($_GET['id']);


		if(IS_POST) {
			$userid = $id;
			$_POST['id'] = $userid;
			if ($users_model->create()) {
				if ($users_model->save() !== false) {
					$user = $users_model->find($userid);

					//l=U('portal/list/index',array('id'=>$r['term_id']));

					$this->success("保存成功！", U('indexadmin/bussedit',array('id'=>$userid)));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($users_model->getError());
			}
		}
	}
}
?>
