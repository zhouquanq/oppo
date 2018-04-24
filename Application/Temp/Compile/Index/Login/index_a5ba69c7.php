<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>OPPO用户登录</title>
		<script src="http://localhost/oppo/Static/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/oppo/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Application/Index/View/Public/css/style.css"/>
	</head>
	<body>
		<!--登录界面头部开始-->
		<div class="head">
			<div class="head_top"></div>
			<div class="head_bottom">
				<a href="<?php echo U('Index/index');?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/logo.png"/></a>
				<span></span>
				<h3>登录OPPO帐号</h3>
				<div class="head_bottom_right">
					<a href="<?php echo U('Index/index');?>">回到首页</a>
					<a href="<?php echo U('Register/index');?>">注册</a>
				</div>
				<a href="<?php echo U('Index/index');?>"><img class="hui" src="http://localhost/oppo/Application/Index/View/Public/images/huishouye.png" alt="" /></a>
				<a href="<?php echo U('Register/index');?>"><img class="login" src="http://localhost/oppo/Application/Index/View/Public/images/login.png"/></a>
			</div>
		</div>
		<!--登录界面头部结束-->
		<!--登录界面中间开始-->
		<div class="login_cont">
			<div class="login_cont_box">
				<div class="login_cont_left">
					<img src="http://localhost/oppo/Application/Index/View/Public/images/login_logo.png" alt="" />
				</div>
				<div class="login_cont_right">
					<form action="<?php echo U('Login/index');?>" method="post" onsubmit="return hd_submit(this,'<?php echo U('Login/index');?>','<?php echo U('Index/index');?>')">
						<input class="username" id="regForm" type="text" name="username" id="" placeholder="会员名/邮箱/手机号"/>
						<span class="username">OPPO帐号（OPPO社区帐号、OPPO乐园帐号）均可登录</span>
						<input class="password" type="password" name="password" id="" placeholder="密码"/>
						<input class="code" type="text" name="code" id="" placeholder="验证码" />
						<img id="code1" class="code1" onclick="javascript:this.src='<?php echo U('Admin/Login/code');?>&mt='+Math.random()" src="<?php echo U('Login/code');?>" alt="" />
						<input class="sub" type="submit" value="登录"/>
						<a class="wangji" href="">忘记密码?</a>
						<a class="zhuce" href="<?php echo U('Register/index');?>">注册新帐号</a><br />
						<span>其他方式登录</span>
						<a href=""><img class="qita" src="http://localhost/oppo/Application/Index/View/Public/images/qita1.png"/></a>
					</form>
				</div>	
			</div>
		</div>
		<!--登录界面中间结束-->
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
