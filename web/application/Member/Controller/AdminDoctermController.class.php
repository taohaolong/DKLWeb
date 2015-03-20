<?php
/**
 * Created by PhpStorm.
 * User: Jacky
 * Date: 2015/2/11
 * Time: 19:07
 */

namespace Member\Controller;
use Common\Controller\AdminbaseController;
class AdminDoctermController extends AdminbaseController
{

    protected $terms_obj;

    protected $taxonomys=array("article"=>"文章","picture"=>"图片");
    function _initialize() {
        parent::_initialize();
        $this->terms_obj = D("Common/Docterms");
        $this->assign("taxonomys",$this->taxonomys);
    }
    function index(){
        $result = $this->terms_obj->order(array("listorder"=>"asc"))->select();

        /*  $tree = new PathTree();
         $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
         $tree->nbsp = '---';
            $tree->init($result);
            $tree=$tree->get_tree();
            $this->assign("terms",$tree); */
        $tree = new \Tree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        foreach ($result as $r) {
            $r['str_manage'] = '<a href="' . U("AdminDocterm/add", array("parent" => $r['term_id'])) . '">添加子类</a>
            | <a href="' . U("AdminDocterm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="J_ajax_del"
            href="' . U("AdminDocterm/delete", array("id" => $r['term_id'])) . '">删除</a> ';

            $url=U('portal/list/index',array('id'=>$r['term_id']));
            $r['url'] = $url;
            $r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
            $r['id']=$r['term_id'];
            $r['parentid']=$r['parent'];
            $array[] = $r;
        }

        $tree->init($array);
        $str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
					<td>\$id</td>
					<td>\$spacer <a href='\$url' target='_blank'>\$name</a></td>
	    			<td>\$taxonomys</td>
					<td align='center'><a href='\$url' target='_blank'>访问</a></td>
					<td>\$str_manage</td>
				</tr>";
        $taxonomys = $tree->get_tree(0, $str);
        $this->assign("taxonomys", $taxonomys);
        $this->display();
        //$this->display();
    }


    function add(){
        $parentid = 0;//intval(I("get.parent"));
        $tree = new \PathTree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '---';
        $result = $this->terms_obj->order(array("path"=>"asc"))->select();
        $tree->init($result);
        $tree=$tree->get_tree();
        $this->assign("terms",$tree);
        $this->assign("parent",$parentid);
        $this->display();
    }

    function add_post(){
        if (IS_POST) {
            if ($this->terms_obj->create()) {
                if ($this->terms_obj->add()!==false) {
                    $this->success("添加成功！",U("AdminDocterm/index"));
                } else {
                    $this->error("添加失败！");
                }
            } else {
                $this->error($this->terms_obj->getError());
            }
        }
    }

    function edit(){
        $id = intval(I("get.id"));
        $tree = new \PathTree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '---';
        $result = $this->terms_obj->where(array("term_id" => array("NEQ",$id), "path"=>array("notlike","%-$id-%")))->order(array("path"=>"asc"))->select();
        $tree->init($result);
        $tree=$tree->get_tree();

        $data=$this->terms_obj->where(array("term_id" => $id))->find();
        $this->assign("terms",$tree);
        $this->assign("data",$data);
        $this->display();
    }

    function edit_post(){
        if (IS_POST) {
            if ($this->terms_obj->create()) {
                if ($this->terms_obj->save()!==false) {
                    $this->success("修改成功！");
                } else {
                    $this->error("修改失败！");
                }
            } else {
                $this->error($this->terms_obj->getError());
            }
        }
    }



    //排序
    public function listorders() {
        $status = parent::_listorders($this->terms_obj);
        if ($status) {
            $this->success("排序更新成功！");
        } else {
            $this->error("排序更新失败！");
        }
    }

    /**
     *  删除
     */
    public function delete() {
        $id = intval(I("get.id"));
        $count = $this->terms_obj->where(array("parent" => $id))->count();
        if ($count > 0) {
            $this->error("该菜单下还有子类，无法删除！");
        }
        if ($this->terms_obj->delete($id)!==false) {
            $this->success("删除成功！");
        } else {
            $this->error("删除失败！");
        }
    }

}

?>