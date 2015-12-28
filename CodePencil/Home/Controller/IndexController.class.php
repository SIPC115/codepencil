<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function _empty(){
        $this->display("Error/error");
    }
	
    public function index(){
        $code = M('code');
        $goodcode = $code -> where('codetype=1')->limit(6)->order("create_time desc")->select();
        $this->assign('gcode',$goodcode);
        $this->display();
    }

    public function connecterror(){
    	$this->display('Error/error');
    }
}
?>	