<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
use Think\Page;
use Think\Upload;
use Think\Image;
class NewsController extends Controller{
public function index(){        
        $news = M('news');
        $news_category = M('news_category');
        $where = 1;
        $news_title = isset($_GET['news_title']) ? in($_GET['news_title']) : "";
        if(!empty($news_title)){
            $where .= " AND news_title like '%".$news_title."%' ";
        }
        $parentid = isset($_GET['parentid']) ? intval($_GET['parentid']) : 0;
        if($parentid){
        	$where .=" AND (cid=".$parentid." or cpid=".$parentid.")";
        }
        $nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $numPerPage = 10;
        $count = $news->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $news->field('id,cpid,cid,news_title,big_img,small_img,release_time')->where($where)->order('release_time desc')->page($nowPage.','.$Page->listRows)->select();
        $cArr = array();
        foreach ($list as $key=>$value){
        	$cl = $news_category->field('id,pid,c_title')->where("id=".$value['cid'])->find();
        	if($cl){
        		if($cl['pid']==0){
        			$list[$key]['b_title'] = $cl['c_title'];
        			$list[$key]['c_title'] = "";
        		}else{
        			$cls = $news_category->field('id,pid,c_title')->where("id=".$cl['pid'])->find();
        			$list[$key]['b_title'] = $cls['c_title'];
        			$list[$key]['c_title'] = $cl['c_title'];
        		}
        		//                 $list[$key]['c_title'] = $cl['c_title'];
        		$cArr[] = $list[$key];
        	}else{
        		$list[$key]['b_title'] = "";
        		$list[$key]['c_title'] = "";
        		$cArr[]=$list[$key];
        	}
        }
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$cArr);
        $this->assign("news_title",$news_title);
        
        $where = 'status=1 and pid=0';
        $list = $news_category->field('id,pid,c_title')->where($where)->order('myorder')->select();
        $cArray = array();
        foreach ($list as $key=>$value){
        	$cl = $news_category->field('id,pid,c_title')->where('pid='.$value['id'])->order('myorder')->select();
        	if($cl){
        		$list[$key]['childY'] = $value['id'];
        		$cArray[] = $list[$key];
        		foreach ($cl as $k=>$v){
        			$cl[$k]['childY'] = $v['pid'];
        			$cArray[] = $cl[$k];
        		}
        	}else{
        		$cl[$k]['childY'] = "";
        		$cArray[] = $list[$key];
        	}
        }
        $this->assign("cl",$cArray);        
        $this->display();
    }
    
    public function add(){
        $news = M('news');
        $news_category = M('news_category');
        if($_POST){            
            $cid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $pc = $news_category->field('pid')->where('id='.$cid)->find();
            $cpid = $pc['pid'];
            $news_title = isset($_POST['news_title']) ? in($_POST['news_title']) : ""; 
            $news_desc = isset($_POST['news_desc']) ? in($_POST['news_desc']) : "";
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;
            $add_time = time();
            $release_time = time();
            $news_content = isset($_POST['news_content']) ? in($_POST['news_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";           
            
            $urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		$big_img_url = "";
    		$small_photo_url = "";
            if(isset($_FILES['big_img'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                if(!is_file($img_url.'news_img')){
                    mkdir($img_url.'news_img');
                }                
                $upload->savePath = 'news_img/';
                $upload->rootPath = $img_url;
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();                    
                }else{
                    $big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
                    $image = new Image();    
                    if(!is_file($img_url.'news_img/thumb_img')){
                        mkdir($img_url.'news_img/thumb_img');
                        if(!is_file($img_url.'news_img/thumb_img/'.$img_date)){
                            mkdir($img_url.'news_img/thumb_img/'.$img_date);
                        }
                    }    
                    $thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'news_img/thumb_img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    
                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    
                    $small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'news_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
                }
            }

            $data = array(
                'cid'           =>  $cid,
                'cpid'          =>  $cpid,
                'news_title'  	=>  $news_title,
                'news_desc'   	=>  $news_desc,
            	'news_content'	=>  $news_content,
                'big_img'     	=>  $big_img_url ,
                'small_img'   	=>  $small_photo_url,                
                'status'   		=>  $status,
                'add_time'      =>  $add_time,
            	'release_time'  =>  $release_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );    
            $id = $news->data($data)->add();
            if($id){
                echo "<script>alert('添加成功！');location.href='index';</script>";              
            }else{
                echo "<script>alert('添加失败！');location.href='add';</script>";
            }
        }
        $where = 'status=1 and pid=0';
        $list = $news_category->field('id,pid,c_title')->where($where)->order('myorder')->select();
        $cArray = array();
        foreach ($list as $key=>$value){
            $cl = $news_category->field('id,pid,c_title')->where('pid='.$value['id'])->order('myorder')->select();
            if($cl){
                $list[$key]['childY'] = $value['id'];
                $cArray[] = $list[$key];
                foreach ($cl as $k=>$v){
                    $cl[$k]['childY'] = $v['pid'];
                    $cArray[] = $cl[$k];    
                }
            }else{
                $cl[$k]['childY'] = "";
                $cArray[] = $list[$key];
            }
        }        
        $this->assign("cl",$cArray);   
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('news_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }

    public function edit(){
        $news = M('news');
        $news_category = M('news_category');
        if($_POST){        
        	$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        	if(!$id){
        		echo "无参数！";
        		exit();
        	}    
            $cid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $pc = $news_category->field('pid')->where('id='.$cid)->find();
            $cpid = $pc['pid'];
            $news_title = isset($_POST['news_title']) ? in($_POST['news_title']) : ""; 
            $news_desc = isset($_POST['news_desc']) ? in($_POST['news_desc']) : "";
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;
            $release_time = time();
            $news_content = isset($_POST['news_content']) ? in($_POST['news_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";  

            $data = array(
            		'cid'           =>  $cid,
            		'cpid'          =>  $cpid,
            		'news_title'  	=>  $news_title,
	                'news_desc'   	=>  $news_desc,
	            	'news_content'	=>  $news_content,
            		'status'   		=>  $status,
            		'release_time'  =>  $release_time,
            		'meta_title'    =>  $meta_title,
            		'meta_keywords' =>  $meta_keywords,
            		'meta_description'  =>  $meta_description
            );
            
            $urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		$big_img_url = "";
    		$small_photo_url = "";
            if(isset($_FILES['big_img'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                if(!is_file($img_url.'news_img')){
                    mkdir($img_url.'news_img');
                }                
                $upload->savePath = 'news_img/';
                $upload->rootPath = $img_url;
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();                    
                }else{
                    $big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
                    $image = new Image();    
                    if(!is_file($img_url.'news_img/thumb_img')){
                        mkdir($img_url.'news_img/thumb_img');
                        if(!is_file($img_url.'news_img/thumb_img/'.$img_date)){
                            mkdir($img_url.'news_img/thumb_img/'.$img_date);
                        }
                    }    
                    $thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'news_img/thumb_img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    
                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    
                    $small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'news_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
                    $data['big_img'] = $big_img_url;
                    $data['small_img'] = $small_photo_url;
                }
            }
    
            $result = $news->data($data)->where('id='.$id)->save();
            if($result){
                echo "<script>alert('修改成功！');location.href='index';</script>";              
            }else{
                echo "<script>alert('修改失败！');location.href='add';</script>";
            }
        }
        
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
        	echo "<script>location.href='index';</script>";
        	exit;
        }
        $dList = $news->where('id='.$id)->find();
        $this->assign("dl",$dList);        
        
        $where = 'status=1 and pid=0';
        $list = $news_category->field('id,pid,c_title')->where($where)->order('myorder')->select();
        $cArray = array();
        foreach ($list as $key=>$value){
            $cl = $news_category->field('id,pid,c_title')->where('pid='.$value['id'])->order('myorder')->select();
            if($cl){
                $list[$key]['childY'] = $value['id'];
                $cArray[] = $list[$key];
                foreach ($cl as $k=>$v){
                    $cl[$k]['childY'] = $v['pid'];
                    $cArray[] = $cl[$k];    
                }
            }else{
                $cl[$k]['childY'] = "";
                $cArray[] = $list[$key];
            }
        }        
        $this->assign("cl",$cArray);   
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('news_content',1000,380);
        $this->assign("editor",$editor_code);
        
        $this->display();
    }
    
    public function delete(){
    	$news = M('news');
        $news_category = M('news_category');
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    	if(!$id){
    		echo "无参数！";
    		exit();
    	}

    	$result = $news->where('id='.$id)->delete();
    	if($result){
    		echo "<script>alert('删除成功！');location.href='index';</script>";
    	}else {
    		echo "<script>alert('删除失败！');location.href='index';</script>";
    	}
    }
}