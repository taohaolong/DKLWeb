<?php

/* * 
 * 系统权限配置，用户角色管理
 */
namespace Member\Controller;
use Common\Controller\AdminbaseController;
class AdminDocroleController extends AdminbaseController {

    protected $User, $Role, $Access, $Role_user;

    function _initialize() {
        parent::_initialize();
        $this->Role = D("Common/Role");
    }

    /**
     * 角色文档授权管理
     */
    public function index() {
		$map['id' ] = array('neq' , 1);

        $data = $this->Role->where($map)->order(array("listorder" => "asc", "id" => "desc"))->select();
        $this->assign("roles", $data);
        $this->display();
    }




    /**
     * 文档角色授权
	 *
	 */
    public function authorize() {
        $this->Docterm = D("Docterms");
		$termRole= D("DocroletermRelationships");



		//角色ID
        $roleid = intval(I("get.id"));
		$strname = strval(I("get.rolename"));
		if (!$roleid) {
			$this->error("参数错误！");
		}

		$newrole=array();

		$termData = $this->Docterm->select();

		$termRoleData = $termRole->where(array("role_id"=>$roleid))->select();


		foreach( $termData as $key1 =>$m)
		{
			$m["checked"] ="";

			if(!is_null($termRoleData)) {

				foreach ($termRoleData as $key2 => $n) {

					if($m["term_id"]==$n["term_id"])
					{

						$m["checked"] ="checked";
					}
				}

			}


			$newrole[] = $m;
		}



		$this->assign("docterms",$newrole);
        $this->assign("roleid",$roleid);
		$this->assign("rname",$strname);

        $this->display();
    }
    
    /**
     * 角色授权  thao
     */
    public function authorize_post() {

		$termRole= D("DocroletermRelationships");
    	if (IS_POST) {
    		$roleid = intval(I("post.roleid"));
    		if(!$roleid){
    			$this->error("需要授权的角色不存在！");
    		}



    		if (is_array($_POST['term_id']) && count($_POST['term_id'])>0) {

				$addauthorize = array();
    			//检测数据合法性
				$termRole->where("role_id=$roleid")->delete();

				foreach ($_POST['term_id'] as $term_id) {
    				$info = array();

    				$info['role_id'] = $roleid;
					$info['term_id']=   $term_id;

					//加入数据库
    				$data = $termRole->add($info);
					/*
    				*/

    			}
				if (!$data) {
					$this->error("授权失败！");

				} else {
					$this->success("授权成功！",U("AdminDocrole/index"));
				}


    		}
    	}
    }
    /**
     *  检查指定菜单是否有权限
     * @param array $data menu表中数组
     * @param int $roleid 需要检查的角色ID
     */
    private function _is_checked($data, $roleid, $priv_data) {
    	
    	$priv_arr = array('app', 'model', 'action');
    	if ($data['app'] == '') {
    		return false;
    	}
    	$mdata['role_id'] = $roleid;
    	$mdata["g"] = $data['app'];
    	$mdata["m"] = ['model'];
    	$mdata["a"] = $data['action'];
    	$info = in_array($mdata, $priv_data);
    	if ($info) {
    		return true;
    	} else {
    		return false;
    	}
    }

    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function _get_level($id, $array = array(), $i = 0) {
        
        	if ($array[$id]['parentid']==0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid']==$id){
        		return  $i;
        	}else{
        		$i++;
        		return $this->_get_level($array[$id]['parentid'],$array,$i);
        	}
        		
    }
    
    /**
     * 获取菜单表信息
     * @param int $menuid 菜单ID
     * @param int $menu_info 菜单数据
     */
    private function _get_menuinfo($menuid, $menu_info) {
        $info = $menu_info[$menuid];
        if(!$info){
            return false;
        }
        $return['g'] = $info['app'];
        $return['m'] = $info['model'];
        $return['a'] = $info['action'];
        return $return;
    }
    
    public function member(){
    	$role_id=$_GET['id'];
    	$users_obj = D("Common/Users");
    	$join = C('DB_PREFIX').'role as b on a.role_id =b.id';
    	$lists=$users_obj->alias("a")->join($join)->where("role_id=$role_id and a.user_status=1")->select();
    	$this->assign("lists",$lists);
    	$this->display();
    	
    }

}

?>
