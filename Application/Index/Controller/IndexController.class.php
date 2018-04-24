<?php
/**
 * 首页控制器
 */
class IndexController extends Controller{
    //动作方法
    public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配更多手机区域
		$phone = K('Goods')->where("type_tid=9")->limit('1,2')->all();
		$this->assign('phone',$phone);
		//分配手机
		$phones1 = K('Goods')->where("type_tid=9")->limit('3,2')->all();
		$this->assign('phones1',$phones1);
		$phones2 = K('Goods')->where("type_tid=9")->limit('6,2')->all();
		$this->assign('phones2',$phones2);
//		p($phones2);
		//分配更多配件区域
		$parts = K('Goods')->where("type_tid=10")->limit('1,2')->all();
		$this->assign('parts',$parts);
		$parts1 = K('Goods')->where("type_tid=10")->limit('2,2')->all();
		$this->assign('parts1',$parts1);
		$parts2 = K('Goods')->where("type_tid=10")->limit('4,2')->all();
		$this->assign('parts2',$parts2);
        $this->display();
    }
	//退出
	public function out(){
		session(null);
//		$this->success('退出成功',U('Index/index'));
		go('Index/index');
	}
}
