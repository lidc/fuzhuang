<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
use Think\Page;
class NodeController extends Controller {
    public function index(){
        $nav_page = M('nav_page');
        $where = 1;
        $nav_title = isset($_GET['nav_title']) ? in($_GET['nav_title']) : "";
        if(!empty($nav_title)){
            $where .= " AND nav_title like '%".$nav_title."%' ";
        }
        $nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $numPerPage = 10;
        $count = $nav_page->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $nav_page->field('id,pid,nav_title,nav_photo,nav_order,nav_status')->where($where)->order('nav_order')->page($nowPage.','.$Page->listRows)->select();
        foreach ($list as $key=>$value){
            if ($value['nav_status']==0){
                $status = '无效';
            }else{
                $status = '有效';
            }
            $list[$key]['status'] = $status;
        }       
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$list);
        $this->assign("nav_title",$nav_title);
        $this->display();
    }
    
    public function add(){
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('page_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }
}