<?php 
/**
 * 商品控制器
 */
class GoodsController extends AuthController{
	private $model;
	public function __init(){
		$this->model = K('Goods');
	}
	//商品页显示
	public function index(){
		$data = $this->model->all();
		$this->assign('data',$data);
		$this->display();
	}
	
	//添加商品
	public function add(){
		if(IS_POST){
			if(!$this->model->addData()){
				$this->error($this->model->error);
			}
			
			$this->success('添加成功',U('Admin/Goods/index'));
		}
		//所属分类分配
		$typeData = K('Category') ->all();
		$typeData = Data::tree($typeData,'sname','sid','spid');
		$this->assign('typeData',$typeData);
		$this->display();
	}
	//删除商品
	public function del(){
		$gid = Q('get.gid');
		//删除商品表
		$this->model->where("gid={$gid}")->delete();
		//删除商品详细表
		K('Detail')->where("goods_gid={$gid}")->delete();
		//删除商品属性表
		K('GoodsAttr')->where("goods_gid={$gid}")->delete();
		$this->success('删除成功');
	}
	
	//编辑商品
	public function edit(){
		if(IS_POST){
			if(!$this->model->editData()){
				$this->error($this->model->error);
			}
			$this->success('修改成功',U('Admin/Goods/index'));
		}
		
		$gid = Q('get.gid');
		//获得旧数据
		$olddata = M()->join("__goods__ g JOIN __goods_attr__ ga ON g.gid=ga.goods_gid JOIN __type__ t ON g.type_tid=t.tid")->where("gid={$gid}")->find();
		$this->assign('olddata',$olddata);
		$sid=$olddata['category_sid'];
		//获得分类数据
		$cateData = Data::tree(K('Category')->all(),'sname','sid','spid');
		$this->assign('cateData', $cateData);
		//获得商品详情表
		$detaildata = K('Detail')->where("goods_gid={$gid}")->find();
		$this->assign('detaildata',$detaildata);
		//属性规格
		$goodsattr = K('GoodsAttr')->where("goods_gid={$gid}")->all();
		$this->assign('goodsattr',$goodsattr);
		//商品图处理
		$oldimg = K('Detail')->where("goods_gid={$gid}")->find();
		$small=$oldimg['small_img'];
		$small = explode(',', $small);
		p($small);
		$this->assign('small',$small);
		
		$this->display();
	}
	
	//ajax
	public function getAttrSpec(){
		if(!IS_AJAX) $this->error('非法请求');
		$tid = Q('post.tid',0,'intval');
		//通过类型属性表获得对应的数据
		$data = K('Attr')->where("attr_type_tid={$tid}")->all();		
		foreach($data as $k => $v){
			$data[$k]['attr_value'] = explode(',', $v['attr_value']);
		}
		$this->ajax($data);
	}
	
	//异步上传列表图
	public function uploadl(){
	     $upload = new Upload('Upload/Content/' . date('y/m'));
		 $file = $upload->upload();
		 if (empty($file)) {
		 	$this->ajax('上传失败');
		 } else {
		 	//来这个地方可以缩略图处理
		 	$data = $file[0];
			$this->ajax($data);
		 }
	}
	//异步上传商品图
	public function upload(){
	     $upload = new Upload('Upload/Content/' . date('y/m'));
		 $file = $upload->upload();
		 if(empty($file)) {
		 	$this->ajax('上传失败');
		 } else {
		 	//处理3张图的路径
		 	$smallPath = dirname($file[0]['path']).'/small_'.$file[0]['basename'];
			$urlPath = dirname($file[0]['path']).'/url_'.$file[0]['basename'];
			$bigPath = dirname($file[0]['path']).'/big_'.$file[0]['basename'];
			//调用框架处理图大小
			$img = new Image();
			$small = $img->thumb($file[0]['path'],$smallPath,77,77,6);
			$url = $img->thumb($file[0]['path'],$urlPath,355,355,6);
			$big = $img->thumb($file[0]['path'],$bigPath,588,588,6);
			$data = $file[0];
			$data['small'] = $small;
			$data['url'] = $url;
			$data['big'] = $big;
			$this->ajax($data);
		 }
	}
	
	//异步删除
	public function delImg(){
	    $path = Q('post.path');
		//删除图片
		unlink($path);
	}
	
	/**
	 * 添加货品
	 */
	//货品主页
	public function hindex(){
		$gid = Q('get.gid',0,'intval');
		$tid = Q('get.tid',0,'intval');
		//查找对应的规格名 
		$spec = K('Attr')->where("attr_type=1 and attr_type_tid={$tid}")->all();
		foreach ($spec as $k => $v) {
			$spec[$k]['option'] = K('GoodsAttr')->where("goods_gid={$gid} AND attribute_attr_id={$v['attr_id']}")->all();
		}
		$this->assign('spec',$spec);
		//获得该商品所填写的货品列表数据
		$listdata = K('GoodsList')->where("goods_gid={$gid}")->all();
		foreach($listdata as $k => $v){
			$listdata[$k]['spec'] =  K('GoodsAttr')->where("gtid in(" . $v['combine'] . ")")->getField('gtvalue',true);
		}
		$this->assign('listdata',$listdata);
		$this->display();
	}
	
	//添加货品表
	public function addl(){
		if(IS_POST){
			$this->model->addList();
			$this->success('添加成功',U('Admin/Goods/index'));
		}
	}
	
	//删除货品
	public function dell(){
		$glid = Q('get.glid');
		K('GoodsList')->where("glid={$glid}")->delete();
		$this->success('删除成功');
	}

	
	
	
	
	
	
	
	
}
 ?>