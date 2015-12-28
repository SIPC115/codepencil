<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//array(验证字段，验证规则，错误提示,[验证条件，附加规则，验证时间])
	protected $_validate = array(
        array('username','require','账号必须'),
        array('username','','用户名重复',0,'unique',self::MODEL_BOTH),
        array('username','','账号格式错误'),
        array('password','require','密码必须'),
        array('repassword','password','确认密码不一致'),
	);
}

?>