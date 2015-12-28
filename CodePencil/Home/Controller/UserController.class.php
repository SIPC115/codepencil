<?php

namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function _empty(){
        $this->display("Error/error");
    }
    
    public function adduser(){
        $User = D('user');
        if($User->creat()){
            $data = $User->filter('strip_tags')->add();
            if($data){
            	$this->success('操作成功',U('Code/####'));
            }else{
            	$this->error('写入错误');
            }
        }else{
        	$this->error($User->getError());
        }
    }

    public function showuser(){
        $User = M('User');
        $this->userData = $User->where(I('session.uid'))->find();
        $this->display();
    }

}

?>