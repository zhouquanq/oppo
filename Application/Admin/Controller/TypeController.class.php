<?php 
/**
 * 类型控制器
 */
class TypeController extends AuthController{
	private $model;
	
	public function __init(){
		parent::__init();
		$this->model = K('Type');
	}
	//显示类型	
	public function index(){
		$data = $this->model->all();
		$this->assign('data',$data);
		$this->display();
	}
	//添加类型
	public function addtype(){
		if(IS_POST){
			if(!$this->model->addtype()){
				$this->error($this->model->error);
			}		
			$this->success('添加成功',U('Admin/Type/index'));
		}
		$this->display();
	}
	//删除类型
	public function del(){
		$tid = Q('get.tid');
		$this->model->where("tid=$tid")->delete();
		$this->success('删除成功');	
	}
	//修改类型
	public function edit(){
		$tid = Q('get.tid');
		if(IS_POST){
			$this->model->where("tid=${tid}")->update();
			$this->success('修改成功',U('Admin/Type/index'));	
		}
		$olddata = $this->model->where("tid=${tid}")->find();
		$this->assign('olddata',$olddata);
		$this->display();
	}

	
	
	
	
	
	
	
	
	
	
	
}

 ?>