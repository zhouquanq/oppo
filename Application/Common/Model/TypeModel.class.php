<?php 
/**
 * 类型模型
 */
class TypeModel extends Model{
	public $table = 'type';
	public $validate = array(
		array('tname','nonull','类型名称不能为空',2,3)
	);
	//添加类型
	public function addtype(){
	    if(!$this->create()) return false;
		$this->add();
		return true;
	}
}


 ?>