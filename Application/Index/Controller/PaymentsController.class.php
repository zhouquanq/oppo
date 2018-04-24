<?php 
/**
 * 支付页面控制器
 */
class PaymentsController extends Controller{
	//支付首页
	public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配订单数据
		$id=Q('get.id');
		$tradedata = K('Li')->where("lid = {$id}")->find();
		$this->assign('tradedata',$tradedata);
//		p($tradedata);
	    $this->display();
	}
	//付款成功处理
	public function zhifu(){
	    $lid = Q('get.lid');
		$data=array(
			'status'=>1,
			'lid'	=> $lid,
		);
		K('Li')->update($data);
		$this->success('付款成功',U('User/index'));
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
 ?>