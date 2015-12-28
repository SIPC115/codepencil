<?php

namespace Home\Controller;
use Think\Controller;
class LogController extends Controller {
    public function _empty(){
        $this->display("Error/error");
    }
    
    //用户登录
    public function login(){
        if(IS_POST){
            //检查登录信息
            $User = M('user');
            if(!$User){
                redirect("Index/connecterror");
            }
            $userdata['username'] = I('post.username');
            $logdata = $User->where($userdata)->find();
            

            if(!$logdata){
                $this->error('该用户不存在');
            }else if($logdata['password']!==I('post.password')){
                $this->error('密码错误',1);
            }else{

            	//设置SESSION 和 COOKIE
                session('uid',$logdata['uid']);
                session('username',$logdata['username']);
                cookie('uid',$logdata['uid'],array('expire'=>3600));
            
                if($_SESSION['uid']){
                    //$this->success('登陆成功',U('Code/readcode?readc=3'),0);
                    $this->redirect('index/index');
                }else{
                	$this->error('登陆失败','',6);
                }
            }


        }else{
            //检查是否处在登陆状态进入的该页面
            if(c_is_login()){
                $this->redirect('Index/index');
            }else{
            	$this->display();
            }
        }
    }
 
    //注销登陆
    public function logout(){
        session_unset();
        session_destroy();
        $this->display('Log/login');
    }
}
?>