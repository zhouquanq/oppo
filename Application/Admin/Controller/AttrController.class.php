<?php 
/**
 * 属性控制器
 */
class AttrController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model = K('Attr');
	}
	//显示属性
	public function index(){
		$tid = Q('get.tid');
		$data = $this->model->where("attr_type_tid={$tid}")->all();
		$this->assign('data',$data);
		$this->display();
	}
	//添加属性
	public function add(){		
		if(IS_POST){
			if(!$this->model->addData()){
				$this->error($this->model->error);
			}
			$this->success('添加属性成功',U('Admin/Type/index'));
		}
		$this->display();
	}
	//删除属性
	public function out(){
		$atid = Q('get.atid');
		$this->model->where("attr_id={$atid}")->delete();
		$this->success('删除属性成功',U('Admin/Type/index'));
	}
	//修改属性
	public function edit(){
		$atid = Q('get.atid');
		$idd = Q('get.attr_type_tid');
		if(IS_POST){
			$this->model->where("attr_id={$atid}")->update();
			$this->success('修改成功',U('Admin/Type/index'));	
		}	
		$olddata = $this->model->where("attr_id={$atid}")->find();
		$this->assign('olddata',$olddata);
		$this->display();
	}
	
	
	
	
	
	
	
	
	
	
}

 ?>