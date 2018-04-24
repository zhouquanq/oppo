<?php 
/**
 * 商品模型
 */
class GoodsModel extends Model{
	public $table = 'goods';
	//自动验证
	public $validate = array(
		array('gname','nonull','商品名称不能为空',2,3),
	);
	//自动完成
	public $auto = array(
		array('addtime','time','function',2,1),
		array('type_tid','_tid','method',2,3),
	);
	public function _tid(){
		$sid=Q('post.category_sid',0,'intval');
		$tid=K('category')->where("sid={$sid}")->field('oppo_type_tid')->find();
		return $tid['oppo_type_tid'];
	}
	//添加商品
	public function addData(){
		if(!$this->create()) return FALSE;
		//添加商品表
		$goods_gid = $this->add();
		//添加商品属性表
		//属性
		$attr_price = Q('post.attr_price');
		foreach(Q('post.attr_id',array()) as $k=>$v){
			$data = array(
				'gtvalue'			=>$v,
				'attr_price'		=>$attr_price,
				'goods_gid'			=>$goods_gid,
				'attribute_attr_id'	=>$k,
			);
			K('GoodsAttr')->add($data);
		}
		//规格
		foreach($_POST['spec_id'] as $k=>$v){
			foreach($v['value'] as $key=>$value){
				$data = array(
					'gtvalue'			=>$value,
					'goods_gid'			=>$goods_gid,
					'attr_price'		=>$attr_price,
					'attribute_attr_id'	=>$k,
				);
				K('GoodsAttr')->add($data);
			}
		}
		//添加商品详情表
		$small = Q('post.small',array());
		$small = implode(',', $small);
		$url = Q('post.url',array());
		$url = implode(',', $url);
		$big = Q('post.big',array());
		$big = implode(',', $big);
		$Detail = K('Detail');
		$data = array(
			'small_img'		=>$small,
			'url_img' 		=>$url,
			'big_img' 		=>$big,
			'goods_gid'		=>$goods_gid,
			'servace'		=>$_POST['servace'],
			'good_detail'	=>$_POST['good_detail'],
		);
		$Detail->add($data);
		return TRUE;
	}
	//编辑
	public function editData(){
		if(!$this->create()) return FALSE;
		//添加商品表
		$gid = Q('post.gid');
		$this->where("gid={$gid}")->update();
		//添加商品属性表
		$GoodsAttr = K('GoodsAttr');
		$attr_price = Q('post.attr_price');
		$GoodsAttr->where("goods_gid={$gid}")->delete();
		foreach(Q('post.attr_id',array()) as $k=>$v){
			$data = array(
				'gtvalue'			=>$v,
				'attr_price'		=>$attr_price,
				'goods_gid'			=>$gid,
				'attribute_attr_id'	=>$k,
			);
			$GoodsAttr->add($data);
		}
		//规格
		foreach($_POST['spec_id'] as $k=>$v){
			foreach($v['value'] as $key=>$value){
				$data = array(
					'gtvalue'			=>$value,
					'goods_gid'			=>$gid,
					'attr_price'		=>$attr_price,
					'attribute_attr_id'	=>$k,
				);
				$GoodsAttr->add($data);
			}
		}
		
		//添加商品详情表
		$small = Q('post.small',array());
		$small = implode(',', $small);
		$url = Q('post.url',array());
		$url = implode(',', $url);
		$big = Q('post.big',array());
		$big = implode(',', $big);
		$Detail = K('Detail');
		$data = array(
			'small_img'		=>$small,
			'url_img' 		=>$url,
			'big_img' 		=>$big,
			'goods_gid'		=>$gid,
			'servace'		=>Q('post.servace'),
			'good_detail'	=>Q('post.good_detail'),
		);
		$Detail->where("goods_gid={$gid}")->update($data);
		//删除该商品的所有货品
		K('GoodsList')->where("goods_gid={$gid}")->delete();
		return TRUE;
	}
	
	//添加商品详情
	public function addList(){
		$combine = Q('post.combine');
		$combine = implode(',', $combine);
		$data = array(
			'combine'  => $combine,
			'goods_sn' => Q('post.goods_sn'),
			'gnumber' => Q('post.gnumber'),
			'goods_gid' => Q('post.goods_gid'),
		);
		K('GoodsList')->add($data);
	}

	

	
	
	
	
	
	
}
