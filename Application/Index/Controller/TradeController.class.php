<?php 
/**
 * 订单控制器
 */
class TradeController extends Controller{
	public function index(){
		//分配顶级
		$uid = $_SESSION['uid'];
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//获得购物车所有信息
		$catedata = Cart::getAllData();
		$this->assign('catedata',$catedata);
//		p($catedata);
		//分配地址信息
		$addata = K('Adress')->where("user_uid={$uid}")->all();
		$this->assign('addata',$addata);
	    $this->display();
	}
	//添加地址
	public function add(){
		$uid = $_SESSION['uid'];
	    if(IS_POST){
	    	$names = Q('post.names');
			$adress = Q('post.province').Q('post.city').Q('post.county').Q('post.xiangxi');
			$phone = Q('post.phone');
			$data = array(
				'adress'	=> $adress,
				'names'		=> $names,
				'phone'		=> $phone,
				'user_uid'	=> $uid,
			);
			K('Adress')->add($data);
			go('Trade/index');
	    }
	}
	//删除地址
	public function del(){
	    $id = Q('get.id');
		K('Adress')->where("id = {$id}")->delete();
		go('Trade/index');
	}
	//提交订单、添加订单表和订单列表
	public function sub(){
		//获得购物车所有信息
		$catedata = Cart::getAllData();
//		p($catedata);
		$uid = $_SESSION['uid'];
	    if(IS_POST){
	    	$id = Q('post.id');
			$totalPrice = $catedata['total'];
			$adress = K('Adress')->where("id={$id}")->field('adress')->find();
			$adress = implode('', $adress);
//			p($adress);  die;
			$user_uid = $uid;
			$data = array(
				'totalPrice'=>$totalPrice,
				'adress'	=>$adress,
				'id'		=>$id,
				'user_uid'	=>$user_uid,
				'add_time'	=>time(),
			);
			//添加订单表
	    	$id = K('Li')->add($data);
			//添加订单列表
			$li_lid = $id;
			$cate = Cart::getGoods();
//			p($cate);die;
			foreach($cate as $k => $v){
				$data = array(
					'num'		=>$v['num'],
					'price'		=>$v['price'],
					'goods_gid'	=>$v['id'],
					'li_lid'	=>$li_lid,
				);
				K('List')->add($data);
				Cart::delAll();
			}
//			go('Payments/index',array('id'=>$id));
			$this->success('订单提交成功',U('Payments/index',array('id'=>$id)));


	    }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}