<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
class NodeController extends Controller {
    public function index(){
        $this->display();
    }
    
    public function add(){
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('textName',700,400);
        $this->assign("editor",$editor_code);
        $this->display();
    }
}