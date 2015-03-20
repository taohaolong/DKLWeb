<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2015/2/8
 * Time: 18:23
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class DocumentController extends MemberbaseController
{

//     protected  $g_docdefualeID;
  //  protected $doclists;

    function  doclistnav()
    {

        $uid=sp_get_current_userid();

        $rold_model = M("Users");
        $role = $rold_model->where("id=$uid")->select();
        $roleid = $role[0]["role_id"];

        $user_docrolelist_model=M("DocroletermRelationships");
        $docrolelists=$user_docrolelist_model->where("role_id=$roleid")->select();



        $user_doclist_model=M("DoctermRelationships");

        foreach($docrolelists as $key=> $val)
        {
            $termid1= $val["term_id"];
            $objectid =$user_doclist_model->where("term_id=$termid1")->select();

            foreach($objectid as $k => $oid)
            {
                $docidlists[] = $oid["object_id"];
            }
        }

        //$doclists =array();
        $docs_model = M("Docs");
        $map['id'] = array('in',$docidlists);
        $this->doclists=$docs_model->where($map)->select();


        $this->assign("doclist",$this->doclists);
    }


    public function index()
    {
        $id = intval($_GET['id']);

     // $this->doclistnav();


        $uid=sp_get_current_userid();

        $rold_model = M("Users");
        $role = $rold_model->where("id=$uid")->select();
        $roleid = $role[0]["role_id"];

        $user_docrolelist_model=M("DocroletermRelationships");
        $docrolelists=$user_docrolelist_model->where("role_id=$roleid")->select();



        $user_doclist_model=M("DoctermRelationships");

        foreach($docrolelists as $key=> $val)
        {
            $termid1= $val["term_id"];
            $objectid =$user_doclist_model->where("term_id=$termid1")->select();

            foreach($objectid as $k => $oid)
            {
                $docidlists[] = $oid["object_id"];
            }
        }

        //$doclists =array();
        $docs_model = M("Docs");
        $map['id'] = array('in',$docidlists);
        $doclists=$docs_model->where($map)->order(array( 'id' =>'asc' ))->select();


        //
       if(empty($id))
        {

         $id = $doclists[0]["id"];;
        }

        $post_model = M("Docs");

        $Docmentss = $post_model->where("id=$id")->select();

        $title = $Docmentss[0]['post_title'];

        $post_content = $Docmentss[0]['post_content'];

        $this->assign("post_title",$title);
        $this->assign("post_content",$post_content);

        $this->assign("doclist",$doclists);

        $this->display(":document");
    }


}

?>