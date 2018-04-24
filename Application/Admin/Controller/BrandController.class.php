<?php 
/**
 * 品牌控制器
 */
class BrandController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model = K('Brand');
	}
	//显示品牌
	public function index(){
		$data = $this->model->all();
		$this->assign('data',$data);
		$this->display();
	}	
	//添加品牌
	public function add(){
		if(IS_POST){
			if(!$this->model->addData()){
				$this->error($this->model->error);
			}
			$this->success('添加成功',U('Admin/Brand/index'));
		}
		$this->display();
	}	
	//删除品牌
	public function out(){
		$bid = Q('get.bid',0,'intval');
		$this->model->where("bid={$bid}")->delete();
		$this->success('删除品牌成功');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}



 ?>