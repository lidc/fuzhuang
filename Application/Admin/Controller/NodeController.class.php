<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
use Think\Page;
use Think\Upload;
use Think\Image;
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
        $nav_page = M('nav_page');
        if($_POST){
            $parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $nav_title = isset($_POST['nav_title']) ? in($_POST['nav_title']) : ""; 
            $nav_desc = isset($_POST['nav_desc']) ? in($_POST['nav_desc']) : "";
            $urlArr = C('TMPL_PARSE_STRING');
            $img_url = $urlArr['__UPLOAD_PATH__'];
            if(isset($_FILES['nav_photo'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $image_obj = new Image();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                $upload->savePath = 'admin_img/';
                $upload->rootPath = $img_url;
//                 $image_obj->thumb(200, 100);
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();
                    $nav_photo_url = "";
                }else{
                    $nav_photo_url = $urlArr['__UPLOAD_URL__'].$info['nav_photo']['savepath'].$info['nav_photo']['savename'];
                }
            }

            $nav_order = isset($_POST['nav_order']) ? intval($_POST['nav_order']) : 0;
            $add_time = time();
            $page_content = isset($_POST['page_content']) ? in($_POST['page_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";
        }
        $where = 'nav_status=1 AND pid=0';
        $list = $nav_page->field('id,nav_title')->where($where)->order('nav_order')->select();
        $this->assign("list",$list);
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('page_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }
}