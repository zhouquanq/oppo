<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>OPPO注册页面</title>
		<script src="http://localhost/oppo/Static/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/oppo/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Application/Index/View/Public/css/style.css"/>
		<script type="text/javascript">
			$(function(){
				var URL = "<?php echo U('Register/register');?>";
				var CODE = "<?php echo U('Register/vecode');?>";
				$('#regForm').validate({
					username : {
						rule : {
							required : true,
							minlen:5,
							ajax:{url:URL}
						},
						error :{
							required : '用户名不能为空',
							minlen:'用户名不得少于5位',
						},
						success:'ok',
						message:'请填写用户名'
					},
					password : {
						rule : {
							required : true,
							minlen:6
						},
						error :{
							required : '密码不能为空',
							minlen:'密码不得少于6位'
							
						},
						success:'ok',
						message:'请填写密码'
					},
					password1: {
						rule : {
							required : true,
							minlen:6,
							confirm: 'password'
						},
						error :{
							required : '确认密码不能为空',
							minlen:'确认密码不得少于6位',
							confirm :'两次密码不相同'
						},
						success:'ok',
						message:'请填写确认密码'
					},
					code : {
						rule : {
							required : true,
							ajax:{url:CODE}
						},
						error : {
							required : '验证码不能为空'
						},
						success:'ok',
						message:'请输入验证码'
					}
				})
			})
		</script>
	</head>
	<body>
		<!--注册界面头部开始-->
		<div class="head">
			<div class="head_top"></div>
			<div class="head_bottom">
				<a href="<?php echo U('Index/index');?>"><img src="http://localhost/oppo/Application/Index/View/Public/images/logo.png"/></a>
				<span></span>
				<h3>注册OPPO帐号</h3>
				<div class="head_bottom_right">
					<a href="<?php echo U('Index/index');?>">回到首页</a>
					<a href="<?php echo U('Login/index');?>">登录</a>
				</div>
				<a href="<?php echo U('Index/index');?>"><img class="hui" src="http://localhost/oppo/Application/Index/View/Public/images/huishouye.png" alt="" /></a>
				<a href="<?php echo U('Login/index');?>"><img class="login" src="http://localhost/oppo/Application/Index/View/Public/images/login.png"/></a>
			</div>
		</div>
		<!--注册界面头部结束-->
		<!--注册界面中间开始-->
		<div class="zhuce_box">
			<div class="zhuce_box_cont">
				<div class="zhuce_box_cont1">
					<span class="zhanghao">如已有账号，请</span><a class="denglu" href="<?php echo U('Login/index');?>">点此登录</a>
					<form id="regForm" action="<?php echo U('Register/index');?>" method="post" >
						<input type="text" class="user" placeholder="邮箱/手机号" name="username" id="" value="" />
						<input type="password" class="pass1" placeholder="密码（密码长度6~16位，数字，字母，字符至少包含两种）" name="password" id="" value="" />
						<input type="password" class="pass2" placeholder="确认密码（密码长度6~16位，数字，字母，字符至少包含两种）" name="password1" id="" value="" />
						<input type="text" class="code" placeholder="验证码" name="code" id="" value="" />
						<img src="<?php echo U('code');?>" alt="" onclick="javascript:this.src='<?php echo U('Admin/Login/code');?>&mt='+Math.random()"/>
						<!--<a class="xieyi" href=""><span class="xiyi"></span></a>-->
						<!--<span class="ton">我已阅读并同意</span><a class="xiey" href="">《OPPO服务协议》</a>-->
						<input class="tijiao" type="submit" value="注册"/>
					</form>
				</div>
			</div>		
		</div>
		<!--注册界面中间结束-->
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
