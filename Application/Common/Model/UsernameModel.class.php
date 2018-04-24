<?php 
/**
 * 前台用户表模型
 */
class UsernameModel extends Model{
	public $table = 'user';
	
	public $validate = array(
		array('username','nonull','用户名不能问空',2,3),
		array('password','nonull','密码不能问空',2,3),
	);
	
	//登录
	public function login(){
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
 
 
 ?>