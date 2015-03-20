<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2015/1/30
 * Time: 20:50
 */

namespace Member\Controller;
use Common\Controller\AdminbaseController;
class AdminPageController extends AdminbaseController
{
    protected $posts_obj;

    function _initialize()
    {
        parent::_initialize();
     //   $this->posts_obj = D("Common/Posts");
    }

    function index()
    {

        $this->display();
       //echo "this is member index !";
    }
}

?>