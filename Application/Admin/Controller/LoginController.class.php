<?php 
/**
 * 登录控制器
 */
class LoginController extends Controller{
	public function index(){
		if(IS_POST){
			$model = K('user');
			if(!$userInfo = $model->login()){
				//如果返回假，输出错误
				$this->error($model->error);
			}
			$_SESSION['aid'] = $userInfo['auid'];
			$_SESSION['adminname'] = $userInfo['adminname'];
			$this->success('登录成功',U('Admin/Index/index'));
		}	
		$this->display();
	}
	
	public function code(){
		$code = new code();
		$code->show();
	}
	public function out(){
		session(null);
		$this->success('退出成功',U('Admin/Login/index'));
	}
}





