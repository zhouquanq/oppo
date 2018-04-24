<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>OPPO商城首页</title>
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
					<li><a href="<?php echo U('Index/index');?>">首页</a></li><div></div>
					<?php foreach ($topdata as $k=>$v){?>
					<li><a href="<?php echo U('List/index',array('sid'=>$v['sid']));?>"><?php echo $v['sname'];?></a></li><div></div>
					<?php }?>
					
				</ul>
				</div>
				<div class="top_box_right">
					<ul>
						<!--<a href=""><li>123</li></a><div></div>-->
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
			<a href="<?php echo U('Index/index');?>">首页</a>&nbsp<i>/</i>&nbsp
			<span>在线购买</span>
		</div>
		<!--子导航结束-->
		<!--轮播区域开始-->
		<div class="carousel">
			<a class="left" href="javascript:;">〈</a>
			<a class="right" href="javascript:;">〉</a>
			<div class="lunbo">
				<a href="<?php echo U('Products/index',array('gid'=>160));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/lunbo1.jpg"/></a>
				<a href="<?php echo U('Products/index',array('gid'=>139));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/lunbo2.jpg"/></a>
				<a href="<?php echo U('Products/index',array('gid'=>136));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/lunbo3.jpg"/></a>
				<a href="<?php echo U('Products/index',array('gid'=>129));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/lunbo4.jpg"/></a>
				<a href="<?php echo U('Products/index',array('gid'=>160));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/lunbo1.jpg"/></a>
			</div>
			<ul>
				<li style="background: #fff;border:2px solid #2AAD6F"></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!--轮播区域结束-->
		<!--内容上-->
		<div class="content_top">
			<div class="top_">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/zhengping.png" alt="" />
				<div class="top_content">
					<strong>正品保障</strong><br />
					<span>所有产品都是原装正品</span>
				</div>
			</div>
			<div class="top_">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/baoyou.png" alt="" />
				<div class="top_content">
					<strong>79元起包邮</strong><br />
					<span>高效的物流直达配送</span>
				</div>
			</div>
			<div class="top_">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/tuihuo.png" alt="" />
				<div class="top_content">
					<strong>7天退换货</strong><br />
					<span>支持7天退货，30天换货</span>
				</div>
			</div>
			<div class="top_">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/tiyan.png" alt="" />
				<div class="top_content">
					<strong>2800家体验店</strong><br />
					<span>轻松自在，覆盖各大城市</span>
				</div>
			</div>
		</div>
		<!--内容中1-->
		<div class="content1">
			<div class="content_con">
				<div class="content_con_big">
					<div class="content_box1">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/content1.1.jpg"/>
						<a class="c1.2" href="<?php echo U('List/index',array('sid'=>19));?>">更多爆款手机</a>
						<p><a class="c1.3" href="<?php echo U('List/index',array('sid'=>19));?>">立即查看</a></p>
					</div>
					<div class="content_box2">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/content1.2.jpg"/>
						<a class="c2" href="<?php echo U('Products/index',array('gid'=>131));?>">N3 电动旋转摄像头</a>
						<p><a href="<?php echo U('Products/index',array('gid'=>131));?>">立即查看</a></p>
					</div>
				</div>
				<div class="content_con_big">
					<div class="content_box3">
						<a class="c3" href="<?php echo U('Products/index',array('gid'=>129));?>">R7 全金属闪拍手机</a>
						<span>￥2499.00</span>
					</div>
					<div class="content_box4">
						<a href="<?php echo U('Products/index',array('gid'=>129));?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/content1.3.jpg" alt="" /></a>
					</div>
				</div>
				<div class="content_con_big">
					<?php foreach ($phones1 as $k=>$v){?>
					<div class="content_box5">
						<img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /><br />
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a>
						<!--<s>￥2999.00</s>-->
						<strong>￥<?php echo $v['price'];?>.00</strong>
					</div>
					<?php }?>
				</div>
				<div class="content_con_big">
					<?php foreach ($phones2 as $k=>$v){?>
					<div class="content_box7">
						<img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /><br />
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?> </a>
						<strong>￥<?php echo $v['price'];?>.00</strong>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<!--内容1结束-->
		<!--内容中2-->
		<div class="content2">
			<div class="content_con">
				<div class="content_con_big">
					<div class="content_box1">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/content2.1.jpg"/>
						<a class="c1.2" href="">更多爆款配件</a>
						<p><a class="c1.3" href="">立即查看</a></p>
					</div>
					<div class="content_box2">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/content2.2.jpg"/>
						<a class="c2" href="<?php echo U('Products/index',array('gid'=>150));?>">iLIKE 蓝牙耳机 LE903</a>
						<p><a href="<?php echo U('Products/index',array('gid'=>150));?>">立即查看</a></p>
					</div>
				</div>
				<div class="content_con_big">
					<div class="content_box3">
						<a class="c3" href="<?php echo U('Products/index',array('gid'=>156));?>">O-Band智能手环 健康监测 智能提醒</a>
						<span>￥2499.00</span>
					</div>
					<div class="content_box4">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/content2.3.jpg" alt="" />
					</div>
				</div>
				<div class="content_con_big">
					<?php foreach ($parts1 as $k=>$v){?>
					<div class="content_box5">
						<img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /><br />
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a>
						<!--<s>￥2999.00</s>-->
						<strong>￥<?php echo $v['price'];?>.00</strong>
					</div>
					<?php }?>
				</div>
				<div class="content_con_big">
					<?php foreach ($parts2 as $k=>$v){?>
					<div class="content_box7">
						<img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /><br />
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a>
						<strong>￥<?php echo $v['price'];?>.00</strong>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<!--内容2结束-->
		<!--内容3开始-->
		<div class="content3">
			<div class="left1">
				<div class="con_top">
					<h2>更多手机</h2>
					<!--<span>浏览:</span>
					<ul>
						<li><a href="">￥1000-￥1999</a></li>
						<li><a href="">￥2000-￥2999</a></li>
						<li><a href="">￥3000以上</a></li>
					</ul>-->
				</div>
				<div class="con_bottom">
					<?php foreach ($phone as $k=>$v){?>
					<div class="con_bottom_left">
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /></a>
						<div class="neirong">
							<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a><br />
							<!--<s></s><br />-->
							<span>￥<?php echo $v['price'];?>.00</span>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="right1">
				<div class="con_top">
					<h2>更多配件</h2>
					<!--<span>浏览:</span>
					<ul>
						<li><a href="">移动电源</a></li>						
						<li><a href="">耳机</a></li>
						<li><a href="">电池</a></li>
						<li><a href="">保护套</a></li>
					</ul>-->
				</div>
				<div class="con_bottom">
					<?php foreach ($parts as $k=>$v){?>
					<div class="con_bottom_left">
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /></a>
						<div class="neirong">
							<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a><br />
							<!--<s></s><br />-->
							<span>￥<?php echo $v['price'];?>.00</span>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="shouji">
				<a href="<?php echo U('List/index',array('sid'=>19));?>">浏览所有手机</a>
			</div>
			<div class="peijian">
				<a href="<?php echo U('List/index',array('sid'=>22));?>">浏览所有配件</a>
			</div>
		</div>
		<!--内容3结束-->
		<!--底部1开始-->
		<div class="bottom1">
			<div>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/bottom1.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/bottom2.jpg"/>
			</div>
		</div>
		<!--底部1结束-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--底部2开始-->
		<div class="bottom2">
			<div class="leftb">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/13.png"/>
				<a href="">OPPO社区</a>
			</div>
			<div class="center">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/14.png"/>
				<a href="">ColorOS</a>
			</div>
			<div class="rightb">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/15.png"/>
				<a href="">软件商店</a>
			</div>
		</div>
		<!--底部2结束-->
		<!--底部3开始-->
		<div class="bottom3">
			<dl>
				<dt><span>推荐机型</span></dt>
				<dd><span>N3</span></dd>
				<dd><span>R5</span></dd>
				<dd><span>Find7</span></dd>
				<dd><span>R1C</span></dd>
				<dd><span>N1 mini</span></dd>
			</dl>
			<dl>
				<dt><span>在线购买</span></dt>
				<dd><span>手机</span></dd>
				<dd><span>移动电源</span></dd>
				<dd><span>手机保护套</span></dd>
				<dd><span>贴膜</span></dd>
				<dd><span>耳机</span></dd>
			</dl>
			<dl>
				<dt><span>服务</span></dt>
				<dd><span>购买帮助</span></dd>
				<dd><span>物流查询</span></dd>
				<dd><span>常见问题</span></dd>
				<dd><span>服务政策</span></dd>
				<dd><span>服务网店查询</span></dd>
			</dl>
			<dl>
				<dt><span>会员登录</span></dt>
				<dd><span>会员注册</span></dd>
				<dd><span>积分兑换</span></dd>
			</dl>
			<dl>
				<dt><span>OPPO品牌</span></dt>
				<dd><span>关于OPPO</span></dd>
				<dd><span>OPPO历史</span></dd>
				<dd><span>OPPO风采</span></dd>
				<dd><span>官方新闻</span></dd>
				<dd><span>OPPO视频</span></dd>
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
