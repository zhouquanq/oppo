<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>我的订单</title>
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Application/Index/View/Public/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/animate.css"/>
	<script src="http://localhost/oppo/Application/Index/View/Public/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/oppo/Application/Index/View/Public/js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--顶部区域开始-->
		<div class="top">
			<div class="top_box">
				<div class="top_box_left">
				<ul>
					<li><a href="">社区</a></li><div></div>
					<li><a href="">ColorOS</a></li><div></div>
					<li><a href="">云服务</a></li><div></div>
					<li><a href="">手机助手</a></li>
				</ul>
				</div>
				<div class="top_box_right">
					<ul>
						<a href=""><li>123</li></a><div></div>
						<?php if(isset($_SESSION['uname'])){ ?>
						<a href="<?php echo U('User/index');?>"><li>我的OPPO</li></a>
						<a href="<?php echo U('Index/out');?>"><li>退出</li></a>
						<?php }else{ ?>
						<a href="<?php echo U('Login/index');?>"><li>登录</li></a><div></div>
						<a href="<?php echo U('Register/index');?>"><li>注册</li></a>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<!--顶部区域结束-->
		<!--logo-导航区域开始-->
		<div class="logo-nav">
			<div class="logo">
				<a href="<?php echo U('Index/index');?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/logo.png"/></a>
			</div>
			<a href="<?php echo U('Cart/index');?>">
				<div class="cart">
					<span>购物车</span>
					<img class="cheche" src="http://localhost/oppo/Application/Index/View/Public/images/gouwuchee.png" alt="" />
				</div>
			</a>
			
			<div class="nav">
				<ul>
					<li><a href="<?php echo U('Index/index');?>">首页</a></li>
					<?php foreach ($topdata as $k=>$v){?>
					<li><a href="<?php echo U('List/index',array('sid'=>$v['sid']));?>"><?php echo $v['sname'];?></a></li>
					<?php }?>
				</ul>
			</div>	
		</div>
		<!--logo-导航区域结束-->
		<div class="line-1"></div>
		<div class="line-2"></div>
		<div class="line-3"></div>	
		<div class="line-4"></div>	
		<div class="line-5"></div>
		<div class="line-6"></div>
		<!--子导航开始-->
		<div class="subnav">
			<a href="">首页</a>&nbsp<i>/</i>&nbsp
			<span>我的OPPO</span>
		</div>
		<!--子导航结束-->
		<!--配送地址内容开始-->
		<div class="user_cont">
			<div class="user_cont1">
				<h2>我的订单</h2>
				<ul>
					<li><a href="<?php echo U('Index/User/index');?>">个人首页</a></li>
					<li><a href="<?php echo U('Index/User/porfile');?>">账户信息</a></li>
					<li><a href="<?php echo U('Index/User/orders');?>" style="color: #393939;border-bottom: 2px solid #2AAD6F;">我的订单</a></li>
					<li><a href="<?php echo U('Index/User/addresses');?>">配送地址</a></li>
				</ul>
			</div>	
			<div class="order">
				<a class="lishi" href="">查看历史订单</a>
				<!--没有订单的情况-->
				<!--<div class="meiyou">
					<span class="zhanwu">暂无订单</span>
				</div>-->
				<!--有订单的情况-->
				<div class="order_top">
					<span class="dingdan">订单编号：<a class="hao" href="">150618123191385</a></span>
					<span class="shi">下单时间：2015-06-18</span>
				</div>
				<ul>
					<li class="shangp">商品</li>
					<li class="shul">数量</li>
					<li class="dingd">订单金额</li>
					<li class="shouh">收货信息</li>
					<li class="zhuangt">状态操作</li>
				</ul>
				<div class="xinx">
					<div class="shang">
						<img src="images/dingdan.jpg"/><br />
						<span>Find7轻装版 全能旗舰 移动4G手机 黑色</span>
					</div>
					<div class="shu">
						<span>1</span>
					</div>
					<div class="ding">
						<span>¥1999.00 </span>
					</div>
					<div class="shou">
						<span>周泉</span><br />
						<span>18872200492</span><br />
						<span>306757130@qq.com</span><br />
						<span>北京市北京市朝阳区孙河马泉营</span>
					</div>
					<div class="zhuang">
						<span>订单状态：已取消</span>
						<a href="">查看详情</a>
					</div>
				</div>
			</div>
		</div>
		<!--配送地址内容结束-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--底部2开始-->
		<div class="bottom2">
			<div class="left">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/13.png"/>
				<a href="">OPPO社区</a>
			</div>
			<div class="center">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/14.png"/>
				<a href="">ColorOS</a>
			</div>
			<div class="right">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/15.png"/>
				<a href="">软件商店</a>
			</div>
		</div>
		<!--底部2结束-->
		<!--底部3开始-->
		<div class="bottom3">
			<dl>
				<dt><a href="">推荐机型</a></dt>
				<dd><a href="">N3</a></dd>
				<dd><a href="">R5</a></dd>
				<dd><a href="">Find7</a></dd>
				<dd><a href="">R1C</a></dd>
				<dd><a href="">N1 mini</a></dd>
			</dl>
			<dl>
				<dt><a href="">在线购买</a></dt>
				<dd><a href="">手机</a></dd>
				<dd><a href="">移动电源</a></dd>
				<dd><a href="">手机保护套</a></dd>
				<dd><a href="">贴膜</a></dd>
				<dd><a href="">耳机</a></dd>
			</dl>
			<dl>
				<dt><a href="">服务</a></dt>
				<dd><a href="">购买帮助</a></dd>
				<dd><a href="">物流查询</a></dd>
				<dd><a href="">常见问题</a></dd>
				<dd><a href="">服务政策</a></dd>
				<dd><a href="">服务网店查询</a></dd>
			</dl>
			<dl>
				<dt><a href="">会员登录</a></dt>
				<dd><a href="">会员注册</a></dd>
				<dd><a href="">积分兑换</a></dd>
			</dl>
			<dl>
				<dt><a href="">OPPO品牌</a></dt>
				<dd><a href="">关于OPPO</a></dd>
				<dd><a href="">OPPO历史</a></dd>
				<dd><a href="">OPPO风采</a></dd>
				<dd><a href="">官方新闻</a></dd>
				<dd><a href="">OPPO视频</a></dd>
			</dl>
		</div>
		<!--底部3结束-->
		<!--底部4开始-->
		<div class="bottom4">
			<div class="bottom4_box">
				<div class="bottom4_box_left">
					<span class="guanzhu">关注我们</span>
					<img class="weibo" src="http://localhost/oppo/Application/Index/View/Public/images/di1.png" alt="" />
					<img class="weix" src="http://localhost/oppo/Application/Index/View/Public/images/di2.png" alt="" />
					<span class="jiaru">加入我们</span>
					<img class="jia" src="http://localhost/oppo/Application/Index/View/Public/images/di3.png" alt="" />
				</div>
				<div class="bottom4_box_right">
					<img src="http://localhost/oppo/Application/Index/View/Public/images/di4.png" alt="" />
					<div class="bottom4_box_right_content1">
						<a class="kefu" href="">在线客服</a><br />
						<a class="shijian" href="">服务时段：8:30~10:00</a>
					</div>
					<img class="del" src="http://localhost/oppo/Application/Index/View/Public/images/di5.png" alt="" />
					<div class="bottom4_box_right_content2">
						<a class="kefu" href="">在线客服</a><br />
						<a class="shijian" href="">服务时段：8:30~10:00</a>
					</div>
				</div>
			</div>
		</div>
		<!--底部4结束-->
		<!--底部5开始-->
		<div class="bottom5">
			<span>© 2005 - 2015 广东欧珀移动通信有限公司 版权所有 粤 ICP 备 08130115 号</span>
		</div>
		<!--底部5结束-->
	</body>
</html>
