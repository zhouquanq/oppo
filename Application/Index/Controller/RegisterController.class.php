<?php 
/**
 * 注册控制器
 */
class RegisterController extends Controller{
	//显示主页
	public function index(){
		//注册
		if(IS_POST){
			$User = K('Username');
			$password = md5(Q('post.paddword'));
			$data = array(
				'username' => Q('post.username'),
				'password' => md5(Q('post.password')),
			);
			$User->add($data);
			$this->success('注册成功',U('Index/index'));
		}
		$this->display();
	}
	
	//异步验证用户名是否存在
	public function register(){
		if(!IS_AJAX) $this->error('非法请求');
		//用户名
		$username = Q('post.username');
		//如果有数据，证明用户名存在
		if(K('Username')->where("username='{$username}'")->find()){
			$this->ajax(array('message'=>'用户名已存在','status'=>false));
		}else{
			$this->ajax(array('message'=>'可以注册','status'=>true));
		}
	}
	
	//异步验证验证码
	public function vecode(){
		if(!IS_AJAX) $this->error('非法请求');
		//用户名
		$code = strtoupper(Q('post.code')) ;
		//如果有数据，证明用户名存在
		if($code == $_SESSION['code']){
			$this->ajax(array('message'=>'验证码正确','status'=>true));
		}else{
			$this->ajax(array('message'=>'验证码错误','status'=>false));
		}
	}
	//显示验证码
	public function code(){
		$code = new code();
		$code->show();
	}
}
