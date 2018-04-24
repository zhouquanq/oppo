<?php 
/**
 * 货品模型
 */
class GoodsListModel extends Model{
	public $table = 'Goods_list';
	public $validate = array(
		array('goods_sn','nonull','库存不能为空',2,3),
	);
	public function addData(){
		if(!$this->create()) return FALSE;
		$this->add();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
