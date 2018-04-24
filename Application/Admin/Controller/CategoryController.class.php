<?php 
/**
 * 分类控制器
 */
class CategoryController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model = K('Category');
	}
	//显示分类
	public function index(){
		$data = $this->model->all();
		$data = Data::tree($data,'sname','sid','spid');
		$this->assign('data',$data);
		$this->display();
	}
	//添加分类
	public function add(){
		if(IS_POST){
			if(!$this->model->addData()){
				$this->error($this->model->error);
			}
			$this->success('分类添加成功',U('Admin/Category/index'));
		}	
		$this->display();
	}
	//删除分类
	public function del(){
		$sid = Q('get.sid',0,'intval');
		//判断该分类下面是否有子分类
		if($this->model->where("spid={$sid}")->find()){
			$this->error('请先删除该分类的子分类');
		}
		$this->model->where("sid={$sid}")->delete();
		$this->success('删除成功');
	}
	//修改分类
	public function edit(){
		if(IS_POST){
			if(!$this->model->edit()){
				$this->error($this->model->error);
			}
			$this->success('分类修改成功',U('Admin/Category/index'));
		}
		$sid = Q('get.sid',0,'intval');	
		$tid = Q('get.poid',0,'intval');
		//获得旧数据
		$oldData = $this->model->where("sid={$sid}")->find();
		$this->assign('oldData',$oldData);
		//获得所有类型	
		$data = K('Type')->all();
		$this->assign('data',$data);
		//获得旧类型	
		$typeData = K('Type')->where("tid={$tid}")->find();
		$this->assign('typeData',$typeData);
		//获得顶级分类
		$topdata = $this->model->where("sid={$sid}")->find();
		$this->assign('topdata',$topdata);
		$this->display();
	}
	//添加子集分类
	public function addson(){
		if(IS_POST){
			if(!$this->model->addData()){
				$this->erroe($this->model->error);
			}
			$this->success('子分类添加成功',U('Admin/Category/index'));
		}
		$data = K('Type')->all();
		$this->assign('data',$data);
		
		$this->display();
	}
	 
	public function getSon(){
		if(!IS_AJAX) $this->error('非法请求',U('Admin/Index/index'));
		$sid = Q('post.sid',0,'intval');
		//获得$sid所对应的所有的子集分类
		$data = $this->model->all();
		$sonSid = $this->model->sonSid($data,$sid);
		//返回给js数据
		$this->ajax($sonSid);
	}	
	
}


 ?>