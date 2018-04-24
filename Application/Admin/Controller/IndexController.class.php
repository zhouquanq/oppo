<?php
//测试控制器类
class IndexController extends AuthController{
    //显示主页
    public function index(){
        //显示视图
        $this->display();
    }
	//欢迎页面
	public function welcome(){
        //显示视图
        $this->display();
    }
	

}
