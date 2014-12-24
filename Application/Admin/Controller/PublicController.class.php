<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class PublicController extends Controller {
    public function verify(){
        $verify = new Verify();        
        $verify->entry();
    }
    
    public function check($myverify){
        $verify = new Verify();

        if(!$verify->check($myverify)){            
            return false;
        }
        return  true;      
    }

}
