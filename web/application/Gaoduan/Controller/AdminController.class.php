<?php
namespace Gaoduan\Controller;
use Common\Controller\AdminbaseController;
//use Common\Common\function;

/**
 * 首页
 */
class AdminController extends AdminbaseController {

	protected $gaousersID=0;
    // 高端医疗页
	public function index() {
		$this->assign('gaoname','[高端]');

		$this->display();//(":index");
    }

    public function meminfo() {
        $this->assign('gaoname','[高端]');
        $gaouserMode = D("Gaousers");

        $gaouser= $gaouserMode->select();
        $this->assign("lists",$gaouser);
        $this->display();//(":index");
    }

	// 需求服务
	public function req() {
		$this->assign('name','[就医需求]');

		$gaouserMode = D("Gaousers");
		$id =$this->gaousersID;
		$gaouser= $gaouserMode->where(array("id"=>$id))->find();

		$this->assign($gaouser);



		$this->display();//(":index");
	}


    public function hospital()
    {

        $this->display();
    }


	public function  findBian()
	{


		$bussid= strval(I("post.buss_id"));
		$userbussMode=D("UsersBuss");
		$buss = $userbussMode->where(array("buss_num"=>$bussid))->select();

		if(empty($buss)){
			$this->error("无此企业编号,请重新输入",U("gaoduan/index/buss"));
		}
		$userid =$buss[0]['user_id'];
		$userMode = D("Users");
		$userinfo =$userMode->where(array("id"=>$userid))->select();

		$cardid=strval(I("post.cardID"));
    	$gusers_model=D("Gaousers");

		$guser=$gusers_model->where(array("cardID"=>$cardid))->find();

		if(empty($guser)){
			$this->assign("buss_name",$userinfo[0]['buss_name']);

			$this->assign("buss_num",$bussid);
			$this->assign("cardID",$cardid);



			$this->display("/Index/index");

		}else
		{
			$this->assign($guser);
			$this->display("/Index/req");
		}

	}

	public function buss()
	{
		$this->display();
	}


	public function finish()
	{
		$mailadd='chen.jian@deucalion.com.cn';
		$mailadd1='taohaodev@163.com';

		SendMail($mailadd1,"新客户通知","请查看后台信息。");
		echo("您的信息已完成，服务人员随后会与你联系");
	}

	function add_post(){

		$hospital_obj=D("Hospital");

        if (IS_POST) {
            if ($hospital_obj->create()) {
                if ($hospital_obj->add()!==false) {
                    $this->success("添加成功！",U('Admin/listhospital'));
                } else {
                    $this->error("添加失败！");
                }
            } else {
                $this->error($hospital_obj->getError());
            }
        }
	}

    /**
     * @诊所列表
     */
    function  listclinic(){


        $id = intval(I("get.hosid"));
        $cilnic_obj=D("Clinic");

        $list =$cilnic_obj->where(array("hosptial_id"=>$id))->select();


        $this->assign("cliniclist",$list);

        $this->display();


    }

    function adddoc_post(){

        $cilnic_obj=D("Doctor");
        if(IS_POST){
            if ( $cilnic_obj->create()) {
                if ($cilnic_obj->add()!==false) {
                    $this->success("添加成功！",U('Admin/listdoctor'));
                } else {
                    $this->error("添加失败！");
                }
            } else {
                $this->error($cilnic_obj->getError());
            }
        }

    }

    function addclinic_post(){

        $cilnic_obj=D("Clinic");
        if(IS_POST){
            if ( $cilnic_obj->create()) {
                if ($cilnic_obj->add()!==false) {
                    $this->success("添加成功！");
                } else {
                    $this->error("添加失败！");
                }
            } else {
                $this->error($cilnic_obj->getError());
            }
        }
    }
    public function addclinic()
    {

        $hospital_obj=D("Hospital");
// todo
        $list = $hospital_obj->select();

        $this->assign("hospitalvar",$list);


        $this->display();
    }

    public function edit()
    {
       //echo "edit";
        $id = intval(I("get.id"));
        $hospital_obj=D("Hospital");
        $list = $hospital_obj->where(array("id"=>$id))->find();



        $this->assign($list);


        $this->display("reqhospital");
        }


    public function editdoctor()
    {
        //echo "edit";
        $id = intval(I("get.id"));
        $hospital_obj=D("Doctor");
        $list = $hospital_obj->where(array("id"=>$id))->find();



        $this->assign($list);


        $this->display("reqdoctor");
    }

    public function editdoc_post()
    {

        $Dao =D("Doctor");

        if($vo = $Dao->create()) {
            $result = $Dao->save();
            if($result !== false){
                $this->success("修改成功！",U('Admin/listhospital'));
//                echo '数据更新成功！';
            }else{
                $this->error("修改失败！"); //terst
//                echo '数据更新失败！';
            }
        }


    }

//todo bug here
    public function edit_post()
    {

        $Dao =D("Hospital");

        if($vo = $Dao->create()) {
            $result = $Dao->save();
            if($result !== false){
                $this->success("修改成功！",U('Admin/listhospital'));
//                echo '数据更新成功！';
            }else{
                $this->error("修改失败！"); //terst
//                echo '数据更新失败！';
            }
        }


    }



    public function edit_postdoc()
    {

        $Dao =D("Doctor");

        if($vo = $Dao->create()) {
            $result = $Dao->save();
            if($result !== false){
                $this->success("修改成功！",U('Admin/listhospital'));
//                echo '数据更新成功！';
            }else{
                $this->error("修改失败！"); //terst
//                echo '数据更新失败！';
            }
        }


    }
    public function listdoctor()
    {
        $hospital_obj=D("Doctor");
        $list = $hospital_obj->select();
        $this->assign("listhos",$list);
        $this->display();
    }

    // add doctot type
    public function doctor()
    {
        $this->display();
    }

    public function editoctor()
    {
        $id = intval(I("get.id"));
        $hospital_obj=D("Doctor");
        $list = $hospital_obj->where(array("id"=>$id))->find();



        $this->assign($list);

        $this->display("reqdoctor");
    }

    public function deletedoctor()
    {

        $id = intval(I("get.id"));
        $hospital_obj=D("doctor");
        $list = $hospital_obj->where(array("id"=>$id))->delete();

        if($list)
        {

            $this->success("删除成功！");
        } else {
            $this->error("删除失败！");
        }

//        $this->display();
    }


    public function delete()
    {

        $id = intval(I("get.id"));
        $hospital_obj=D("Hospital");
        $list = $hospital_obj->where(array("id"=>$id))->delete();

        if($list)
        {

            $this->success("删除成功！");
        } else {
            $this->error("删除失败！");
        }

//        $this->display();
    }

    public function listhospital()
    {

//        echo "listhospital";
        $hospital_obj=D("Hospital");
        $list = $hospital_obj->select();
        $this->assign("listhos",$list);
        $this->display();

    }


	public function  bianhao()
	{
		$users_model=D("UsersBuss");

		$user=$users_model->select();


		$this->assign("user",$user);
		//$this->success("授权成功！");
		$this->display();
	}

    function  newpatient()
    {
        $userdoctor_obj = D("Gaoduanuserdoctor");
        // $userdoctor_obj->create();
        $list =$userdoctor_obj->select();



        $this->assign("list",$list);

        $this->display();
    }

    function  patientinfo()
    {
        $userID = intval(I("get.gaouserid"));
        $userdoctor_obj = D("Gaoduanuserdoctor");
        // $userdoctor_obj->create();
        $list =$userdoctor_obj->where(array("gaouserid"=>$userID))->select();
        if(empty($list)){
            $this->error("暂无就医信息");
        }
        $this->assign("list",$list);

        $this->display();
    }

    function ban(){
        $id=intval($_GET['id']);
        if ($id) {
            $rst = M("Gaoduanuserdoctor")->where(array("id"=>$id))->setField('auth','1');
            if ($rst) {
                $this->success("会员审核通过！", U("Admin/newpatient"));
            } else {
                $this->error('会员审核失败！');
            }
        } else {
            $this->error('数据传入失败！');
        }
    }

}

?>
