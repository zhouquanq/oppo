<?php 
class AuthController extends Controller{
	public function __init(){
		//没有登录跳回登录页面
		if(!isset($_SESSION['aid']) || !isset($_SESSION['adminname'])){
			go(U('Admin/Login/index'));
		}
	}
}

 ?>