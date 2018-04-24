<?php 
/**
 * 登录控制器
 */
class LoginController extends Controller{
	private $model;
	public function __init(){
	    $this->model = K('Username');
	}
	//登录
	public function index(){
		if(IS_POST){
			$username = Q('post.username');
			$password = md5(Q('post.password'));
			$code = strtoupper(Q('post.code')) ;
			$old = $this->model->where("username='{$username}'")->find();
			if(!$old['username']){
				$this->error('用户名不存在');
			}
			if($password != $old['password']){
				$this->error('密码错误');
			}
			if($code != session('code')){
				$this->error('验证码错误');
			}
			$_SESSION['uname'] = $username;
			$_SESSION['uid'] = $old['uid'];
			$this->success('登录成功');
		}
		$this->display();
	}
	//显示验证码
	public function code(){
		$code = new code();
		$code->show();
	}
}

 ?>