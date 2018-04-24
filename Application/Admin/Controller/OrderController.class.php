<?php 
/**
 * 后台订单控制器
 */
class OrderController extends AuthController{
	public function index(){
		$list = M()->join("__li__ l JOIN __list__ ls ON l.lid=ls.li_lid JOIN __goods__ g ON ls.goods_gid=g.gid JOIN __adress__ a ON l.id=a.id")->all();
		$this->assign('list',$list);
//		p($list);
	    $this->display();
	}
	//点击发货 完成发货
	public function fahuo(){
		$lid = Q('get.lid');
		$data=array(
			'status'=>2,
			'lid'	=> $lid,
		);
		K('Li')->update($data);
		$this->success('订单状态修改成功');
	}
}
 ?>