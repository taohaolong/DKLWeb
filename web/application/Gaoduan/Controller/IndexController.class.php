<?php
namespace Gaoduan\Controller;
use Common\Controller\HomeBaseController;
//use Common\Common\function;

/**
 * 首页
 */
class IndexController extends HomeBaseController {

	protected $gaousersID=0;
    // 高端医疗页
	public function index() {
		$this->assign('gaoname','[高端]');

		$this->display();//(":index");
    }

	// 需求服务
	public function req() {
		$this->assign('name','[就医需求]');


		$gaouserMode = D("Gaousers");
		$id =$this->gaousersID;
		$gaouser= $gaouserMode->where(array("id"=>$id))->find();

        $this->assign($gaouser);

        $this->listSelectvar();

        $this->display();
	}

    public function first()
    {
        $this->display();
    }


    protected function listSelectvar()
    {

        $hospital_obj=D("Hospital");
        $list = $hospital_obj->select();

        $clinic_obj = D("Clinic");
        $cid = "3";
        $cliniclist = $clinic_obj->where(array('hosptial_id'=>$cid))->select();

        $doctor_obj = D("Doctor");
        $listdr = $doctor_obj->select();

        $this->assign("doctorvar",$listdr);
        $this->assign("hospitalvar",$list);
        $this->assign("clinicvar",$cliniclist);


    }



    // todo 企业对应关系

	public function  findBian()
	{


		$bussname= strval(I("post.buss_name"));
		$userbussMode=D("Users");

        // todo 查询条件


		$buss = $userbussMode->where(array('buss_name'=>$bussname))->select();

		if(empty($buss)){
			$this->error("无此企业,请重新输入",U("gaoduan/index/buss"));
		}
		$userid =$buss[0]['id'];
		$userMode = D("UsersBuss");
		$userinfo =$userMode->where(array("user_id"=>$userid))->select();
        // 获得企业编号
        $bussnum = $userinfo[0]['buss_num'];



		$cardid=strval(I("post.cardID"));

    	$gusers_model=D("Gaousers");

		$guser=$gusers_model->where(array("cardID"=>$cardid,"buss_num"=>$bussnum))->find();

		if(empty($guser)){
			$this->assign("buss_name",$bussname);

			$this->assign("buss_num",$userinfo[0]['buss_num']);
			$this->assign("cardID",$cardid);



			$this->display("/Index/index");

		}else
		{
			$this->assign($guser);

            $this->listSelectvar();

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
		$mailadd1=C('SP_SEND_MAIL_ADDRESS');//'taohaodev@163.com';

        $hospital_name =strval(I("post.hospital_name"));
        $doctor_name =strval(I("post.doctor_type"));
        $clinic_name =strval(I("post.clinic_name"));
        $user_name = strval(I("post.user_name"));
        //var_dump($user_name);
        $strtipe = "您选择的是:[".$hospital_name."][".$clinic_name."][".$doctor_name."]";
        $userinfo = "有会员[".$user_name."]新的就医需求：  [".$hospital_name."]->[".$clinic_name."]->[".$doctor_name."]"
            ."请查看后台信息,进行审核。  http://deucalion.veternal.com/cmfx/index.php?g=Admin&m=Index&a=index";
        $ID =I("post.gaouserid");

//       // var_dump($ID);
        $userdoctor_obj = D("Gaoduanuserdoctor");
        $userdoctor_obj->create();
        $ret = $userdoctor_obj->add();
        if($ret == false)
        {
            $this->error("添加失败！");
        }

       //var_dump($mailadd1);


        SendMail($mailadd,"新客户通知--[".$user_name."]",$userinfo);
        $this->assign("Tipe",$strtipe);

        $this->assign("warring","您的信息已填写完成，随后会有工作人员和您确认信息后并在1-3个工作日内通知您结果");



        $this->display();



    }



	function add_post(){

		$gaouser_obj=D("Gaousers");

		$cardid=strval(I("post.cardID"));


 		if(IS_POST){
			if ($gaouser_obj->create()) {
				if ($gaouser_obj->add()!==false) {

					$gaouser=$gaouser_obj->where(array("cardID"=>$cardid))->find();
					$this->assign($gaouser);
                    $this->listSelectvar();

					$this->display("/Index/req");
				//	$this->success("添加成功！", U("gaoduan/Index/req"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($gaouser_obj->getError());
			}
		}
	}


	public function  bianhao()
	{
		$users_model=D("UsersBuss");

		$user=$users_model->select();


		$this->assign("user",$user);
		//$this->success("授权成功！");
		$this->display();
	}

}

?>
