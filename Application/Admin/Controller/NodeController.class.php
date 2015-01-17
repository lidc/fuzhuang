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
        $list = $nav_page->field('id,pid,nav_title,nav_photo,thumb_photo,nav_order,nav_status')->where($where)->order('nav_order')->page($nowPage.','.$Page->listRows)->select();
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
            $img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
            $font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体 
            if(isset($_FILES['nav_photo'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();                
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                $upload->savePath = 'Original_Img/';
                $upload->rootPath = $img_url;                
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();
                    $nav_photo_url = "";
                    $thumb_photo_url = "";
                }else{
                    $nav_photo_url = $urlArr['__UPLOAD_URL__'].$info['nav_photo']['savepath'].$info['nav_photo']['savename'];
                    $image = new \Think\Image();
                    
                    if(!is_file($img_url.'Thumb_Img/'.$img_date)){
                        mkdir($img_url.'Thumb_Img/'.$img_date);
                    }
                    
                                        
                    $thumb_save_file = $img_url.$info['nav_photo']['savepath'].$info['nav_photo']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'Thumb_Img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['nav_photo']['savename'];                               //缩略图保存的路径

                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);  

                    $thumb_photo_url = $urlArr['__UPLOAD_URL__'].'Thumb_Img/'.$img_date.'/'.$info['nav_photo']['savename'];;                  
                }
            }else{
                $nav_photo_url = "";
                $thumb_photo_url = "";
            }
            $nav_order = isset($_POST['nav_order']) ? intval($_POST['nav_order']) : 0;
            $nav_status = isset($_POST['nav_status']) ? intval($_POST['nav_status']) : 1;
            $add_time = time();
            $page_content = isset($_POST['page_content']) ? in($_POST['page_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";

            $data = array(
                'pid'           =>  $parentid,
                'nav_title'     =>  $nav_title,
                'nav_desc'      =>  $nav_desc,
                'nav_photo'     =>  $nav_photo_url,
                'thumb_photo'   =>  $thumb_photo_url,
                'nav_order'     =>  $nav_order,
                'nav_status'    =>  $nav_status,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );    
            $id = $nav_page->data($data)->add();
            if($id){
                $data_c = array(
                    'nav_id'    =>  $id,
                    'content'   =>  $page_content
                );
                $nav_content = M('page_content');
                $result = $nav_content->data($data_c)->add();
                if($result){
                    echo "<script>alert('添加内容成功！');</script>";
                }else{
                    echo "<script>alert('添加内容失败！');</script>";
                }
            }else{
                echo "<script>alert('添加失败！');</script>";
            }

        }
        $where = 'nav_status=1 AND pid=0';
        $list = $nav_page->field('id,nav_title')->where($where)->order('nav_order')->select();
        $this->assign("list",$list);
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('page_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }

    public function edit(){
        $nav_page = M('nav_page');
        if($_POST){            
            $parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $nav_title = isset($_POST['nav_title']) ? in($_POST['nav_title']) : ""; 
            $nav_desc = isset($_POST['nav_desc']) ? in($_POST['nav_desc']) : "";
            $urlArr = C('TMPL_PARSE_STRING');            
            $img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
            $font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体 
            if(isset($_FILES['nav_photo'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();                
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                $upload->savePath = 'Original_Img/';
                $upload->rootPath = $img_url;                
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();
                    $nav_photo_url = "";
                }else{
                    $nav_photo_url = $urlArr['__UPLOAD_URL__'].$info['nav_photo']['savepath'].$info['nav_photo']['savename'];
                    $image = new \Think\Image();
                    
                    if(!is_file($img_url.'Thumb_Img/'.$img_date)){
                        mkdir($img_url.'Thumb_Img/'.$img_date);
                    }
                    
                                        
                    $thumb_save_file = $img_url.$info['nav_photo']['savepath'].$info['nav_photo']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'Thumb_Img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['nav_photo']['savename'];                               //缩略图保存的路径

                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);                    
                }
            }else{
                $nav_photo_url = "";
            }
            $nav_order = isset($_POST['nav_order']) ? intval($_POST['nav_order']) : 0;
            $nav_status = isset($_POST['nav_status']) ? intval($_POST['nav_status']) : 1;
            $add_time = time();
            $page_content = isset($_POST['page_content']) ? in($_POST['page_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";

            $data = array(
                'pid'           =>  $parentid,
                'nav_title'     =>  $nav_title,
                'nav_desc'      =>  $nav_desc,
                'nav_photo'     =>  $nav_photo_url,
                'nav_order'     =>  $nav_order,
                'nav_status'    =>  $nav_status,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );    
            $id = $nav_page->data($data)->add();
            if($id){
                $data_c = array(
                    'nav_id'    =>  $id,
                    'content'   =>  $page_content
                );
                $nav_content = M('page_content');
                $result = $nav_content->data($data_c)->add();
                if($result){
                    echo "<script>alert('添加内容成功！');</script>";
                }else{
                    echo "<script>alert('添加内容失败！');</script>";
                }
            }else{
                echo "<script>alert('添加失败！');</script>";
            }

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