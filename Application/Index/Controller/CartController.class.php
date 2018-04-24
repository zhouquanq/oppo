<?php 
/**
 * 购物车控制器
 */
class CartController extends Controller{
	//购物车信息
	public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//获得购物车所有信息
		$catedata = Cart::getAllData();
		$this->assign('catedata',$catedata);
//		p($catedata);
	    $this->display();
	}
	//删除购物车
	public function del(){
	    $sid = Q('get.sid');
		cart::del($sid);
		go('Cart/index');
	}
	//购物车商品数量增加
	public function num_jia(){
	    $num = Q('get.num')+1;
		$sid = Q('get.sid');
		$data = array(
			'num' => $num,
			'sid' => $sid,
		);
		Cart::update($data);
		go('Cart/index');
	}
	//购物车商品数量减少
	public function num_jian(){
	    $num = Q('get.num');
		$sid = Q('get.sid');
		if($num>1){
			$data = array(
			'num' => $num-1,
			'sid' => $sid,
			);
			Cart::update($data);
		}
		go('Cart/index');
	}
}
