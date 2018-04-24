<?php 
/**
 * 商品页控制器
 */
class ProductsController extends Controller{
	//主页
	public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配商品信息
		$gid = Q('get.gid');
		$good = M()->join("__goods__ g JOIN __detail__ d ON g.gid=d.goods_gid")->where("gid={$gid}")->find();
		$this->assign('good',$good);
		//分配商品图
		$img = M()->join("__goods__ g JOIN __detail__ d ON g.gid=d.goods_gid")->where("gid={$gid}")->field("small_img,big_img")->all();
		//分配大图
		$big = explode(',', $img[0]['big_img']);
		//数组反转
		$big = array_reverse($big);
		$this->assign('big',$big);
		//分配小图
		$small = explode(',', $img[0]['small_img']);
		$small = array_reverse($small);
		$this->assign('small',$small);
		//分配商品属性
		$tid = $good['type_tid'];
		$spec = K('Attr')->where("attr_type=1 and attr_type_tid={$tid}")->all();
		foreach ($spec as $k => $v) {
			$spec[$k]['option'] = K('GoodsAttr')->where("goods_gid={$gid} AND attribute_attr_id={$v['attr_id']}")->all();
		}
		$this->assign('spec',$spec);
		
		//存session  用于之后查询最近浏览
		$gsid = Q('get.gid');
		if(!isset($_SESSION['gsid'])){
			$_SESSION['gsid'][] = $gsid;
		}else{
			$gsids = $_SESSION['gsid'];
			if(count($gsids)<4){
				$_SESSION['gsid'][] = $gsid;
			}else{
				array_shift($_SESSION['gsid']);
				$_SESSION['gsid'][] = $gsid;
			}
		}
		//浏览记录保存3天
		setcookie(session_name(),session_id(),time() + 3600 * 24 * 3,'/');

		$this->display();
	}
	//异步获得所选规格
	public function _type(){
	    if(!IS_AJAX) $this->error('非法请求');
		$id = Q('post.id');
		$where = rtrim($id,',');
		$data = K('goodsAttr')->where("gtid in(" . $where . ")")->all();
//		p($data);
		$this->ajax($data);
	}
	//添加购物车
	public function shop(){
		$gid = Q('post.gid');
		if(!isset($_SESSION['uid'])){
			$this->success('请先登录',U('Login/index'));
		}
//		p(Q("post."));
		$price = Q('post.price');
		$num = Q('post.num');
		$name = Q('post.name');
		$options = Q('post.attr');
		$options = implode('|', $options);
		$img = Q('post.img');
		$data = array(
			'id'	=> $gid,
			'name'	=> $name,
			'num'	=> $num,
			'price'	=> $price,
			'options'	=> $options,
			'img'		=>$img,
		);
		cart::add($data);
		go('Index/Cart/index');

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
