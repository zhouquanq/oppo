<?php 
/**
 * 用户表模型
 */
class UserModel extends Model{
	public $table = 'admin';
	public $validate = array(
		array('username','nonull','用户名不能为空',2,3),
		array('password','nonull','密码不能为空',2,3),
		array('code','nonull','验证码不能为空',2,3)
	);
	//登录操作
	public function login(){
		//如果自动验证失败
		if(!$this->create()) return false;
		if(Q('post.code','','strtoupper') != $_SESSION['code']){
			$this->error = '验证码错误';
			return false;
		}
		$username = Q('post.username');
		$userInfo = $this->where("adminname = '{$username}'")->find();
		if(!$userInfo || $userInfo['passwd'] != Q('post.password','','md5')){
			$this->error = '用户名或者密码错误';
			return false;
		}
		//返回用户信息
		return $userInfo;
	}
}


 ?>