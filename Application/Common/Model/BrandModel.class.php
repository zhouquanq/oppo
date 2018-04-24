<?php 
/**
 * 品牌模型
 */
class BrandModel extends Model{
	public $table = 'brand';
	//自动验证
	public $validate = array(
		array('bname','nonull','品牌名称不能为空',2,3),
	);
	//自动完成
	public $auto = array(
		array('logo','_logo','method',2,3),
	);
	
	public function _logo(){
		if(isset($_FILES['logo']) && $_FILES['logo']['error']!=4){
			$upload = new Upload();
			$files = $upload->upload();
			//如果上传失败
			if(!$files){
				$this->error = $upload->error;
			}else{
				$img = new Image();
				return $img->thumb($files[0]['path']);
			}
		}
	}
	
	public function addData(){
		if(!$this->create()) return FALSE;
		if($this->error) return FALSE;
		$this->add();
		return TRUE;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}




 ?>