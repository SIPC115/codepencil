<?php
namespace Home\Controller;
use Think\Controller;
class CodeController extends Controller {
    public function _empty(){
        $this->display("Error/error");
    }

    //代码添加 以及 编辑 自动验证里添加####
    //添加和更新 返回{"status":"success/error"}
    public function addcode(){
        if(empty($_SESSION['uid']) || empty($_SESSION['username'])) {
            echo '{"state" : "error2"}';
            return false;
        }
        $User = M('code');
        if($_POST['cid']!=0){    
            if($User->create()){
				if($_POST['codename'] == '') {
					$_POST['codename'] = "未命名代码片段";
				}
                $result = $User->where("cid={$_POST['cid']}")->save($_POST);
                if($result){
                    echo '{"state":"success"}';
                }else{
                    echo '{"state":"error"}';
                }
            }
        }elseif($_POST['cid']==0){                
                if($_POST['codename']==''){
                    $data['codename'] = "未命名代码片段";
                }else{
                    $data['codename'] = $_POST['codename'];
                }
                $data['codemessage'] = $_POST['codemessage'];
                $data['htmlcode'] = $_POST['htmlcode'];
                $data['csscode'] = $_POST['csscode'];
                $data['jscode'] = $_POST['jscode'];
                $data['uid']=$_SESSION['uid'];
                $data['username']=$_SESSION['username'];
                $data['create_time'] = date('y-m-d h:m:s');
                if($User->create()){
                    $result = $User->add($data);
                    if($result){
                        echo '{"state":"success", "cid" : '.$result."}";
                    }else{
                        echo '{"state":"error1"}';
                    }
                }
        }else{
            $this->display("Error/error");
        }
    }
    
    //返回一组代码
    public function readcode(){
    	if(I('get.readc')=='1'){
    	    if(!empty($_GET['cid'])) {
                $Code = M('code');
                //$codedata = $Code->where($_SESSION['uid'])->find();
                $codedata = $Code->where("cid={$_GET['cid']}")->find(); //
                $Response = new \Home\Common\Response();
                $codepack = $Response->show(1,'success',$codedata,"json");
                echo $codepack;
            }
        }elseif(I('get.readc')=='2'){
            $User = M('code'); 
            $page =getpage($User,'',18);
            $orderby['create_time']='desc';
            $list = $User->where("uid=$_SESSION[uid]")->order($orderby)->field('cid,uid,codename,username')->select();
            $show = $page ->show();

            if(!$list){
                $this->display('Error/error');
            }

            $this->assign('page',$show);
            $this->assign('code',$list);

            $this->display('codeme');
        }elseif(I('get.readc')=='3'){
                $User = M('code'); 
                $p=getpage($User,'',18);
                $orderby['create_time']='desc';
                $list = $User->order($orderby)->field('cid,uid,codename,username')->select();
                $show = $p ->show();

                if(!$list){
                    $this->display('Error/error');
                }
            
                $this->assign('page',$show);
                $this->assign('code',$list);
             //var_dump($show);
                $this->display('code');
        }
    }


    public function delcode(){
            $User = M('User');
            $where = I('post.uid');
            if($User->where($where)->delete()){
                $this->success('操作成功!');
            }else{
                $this->error('操作失败!');
            }
	}
    
    public function index(){
        if($_GET['cid']==0){
            $cid = $_GET['cid'];
            $this->assign('cid',$cid);
            $this->assign("username", $_SESSION['username']);
            $this->display('Code/editor');
        }else{
            $code = M('code');
            $cid = intval($_GET["cid"]);
            $codedata=$code->where("cid={$_GET['cid']}")->find();

            $this->assign('username', $codedata['username']);
            
            $this->assign('cid',$cid);
            $this->assign('codedata',$codedata);
            $this->display('Code/editor');
        }
    }

}

?>
