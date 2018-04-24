<?php 
/**
 * 属性模型
 */
class AttrModel extends Model{
	public $table = 'attribute';
	public $validate = array(
		array('attr_name','nonull','属性名称不能为空',2,3),
		array('attr_value','nonull','属性值不能为空',2,3)
	);
	//添加属性
	public function addData(){
		if(!$this->create()) return FALSE;
		$this->add();
		return TRUE;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}


 ?>