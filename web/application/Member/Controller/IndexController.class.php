<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2015/1/30
 * Time: 19:11
 */


namespace Member\Controller;
use Common\Controller\HomeBaseController;
class IndexController extends HomeBaseController{

    protected $member_obj,$role_obj;

    function _initialize() {
        parent::_initialize();
        $this->member_obj = D("Member");
       // $this->role_obj = D("Common/CommonRole");
    }

    function index(){
      //  echo "this is member$this->test();
        $this->display(":register");


    }



}


?>