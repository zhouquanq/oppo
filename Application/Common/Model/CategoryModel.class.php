<?php 
/**
 * 分类模型
 */
class CategoryModel extends Model{
	public $table = 'category';
	//自动验证
	public $validate = array(
		array('sname','nonull','分类名称不能为空',2,3),
	);
	//添加
	public function addData(){
	    if(!$this->create()) return FALSE;
		$this->add();
		return true;
	}
	//修改
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->update();
		return true;
	}
	
	public function sonSid($data,$sid){
		static $temp = array();
		foreach ($data as $v) {
			if($v['spid'] == $sid){
				$temp[] = $v['sid'];
				$this->sonSid($data, $v['sid']);
			}
		}
		return $temp;
	}
}


 ?>