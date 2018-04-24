<?php 
/**
 * 个人中心控制器
 */
class UserController extends Controller{
	//个人中心
	public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配状态
		$uid =  $_SESSION['uid'];
		$order = M()->join("__li__ l JOIN __list__ ls ON l.lid=ls.li_lid JOIN __goods__ g ON ls.goods_gid=g.gid")->where("user_uid={$uid}")->all();
		$this->assign('order',$order);
//		p($order); 
	    $this->display();
	}
	//账户信息
	public function porfile(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配个人信息
		$uid = $_SESSION['uid'];
		$user = K('Username')->where("uid = {$uid}")->find();
		$this->assign('user',$user);
//		p($user);
		//修改密码
		if(IS_POST){
			$password = md5(Q('post.pasd'));
			$data = array(
				'password'	=> $password,
				'uid'		=> $_SESSION['uid'],
			);
			K('Username')->update($data);
			session(null);
			$this->success('密码修改成功，请重新登录',U('Login/index'));
		}
		
	    $this->display();
	}
	//更改用户信息
	public function edituser(){
//	    p(Q("post."));
		$uid = Q('post.uid');
		$birthday = Q('post.YYYY') . '年' . Q('post.MM') . '月' . Q('post.DD') . '日';
		$sex = Q('post.sex');
		$username = Q('post.username');
		$data = array(
			'username'	=> $username,
			'sex'		=> $sex,
			'birthday'	=> $birthday,
			'uid'		=> $uid,
		);
		K('Username')->update($data);
		go('User/porfile');

	}
	//我的订单
	public function orders(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//分配状态
		$uid =  $_SESSION['uid'];
		$order = M()->join("__li__ l JOIN __list__ ls ON l.lid=ls.li_lid JOIN __goods__ g ON ls.goods_gid=g.gid JOIN __adress__ a ON l.id=a.id")->where("a.user_uid={$uid}")->all();
		$this->assign('order',$order);
	    $this->display();
	}
	//配送地址
	public function addresses(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//获取该帐号的所有地址
		$uid = $_SESSION['uid'];
		$adress = K('adress')->where("user_uid = {$uid}")->all();
		$this->assign('adress',$adress);
	    $this->display();
	}
	//个人中心添加地址
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
			go('User/addresses');
	    }
	}
	//个人中心删除地址
	public function del(){
	    $id = Q('get.id');
		K('Adress')->where("id = {$id}")->delete();
		go('User/addresses');
	}
	//确认收货方法
	public function queren(){
	    $lid = Q('get.lid');
		$data=array(
			'status'=>3,
			'lid'	=> $lid,
		);
		K('Li')->update($data);
		$this->success('收货成功，交易完成');
	}
}
 
 
 
 ?>