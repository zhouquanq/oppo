<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>个人中心-配送地址</title>
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
		<script language="javascript" src="http://localhost/oppo/Static/address.js"></script>
		<script src="http://localhost/oppo/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
		<script type="text/javascript">
			 	var s=["s1","s2","s3"];
				var opt0 = ["请选择省","请选择市","请选择县（区）"];
				function setup(){
				 for(i=0;i<s.length-1;i++)
				  document.getElementById(s[i]).onclick=new Function("change("+(i+1)+")");
				 change(0);
				}
				window.onload=function(){
				setup()	
					
				};
				$(function(){
					
					$('.dj').live('click',function(){
						var dj = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
						alert(dj);	
					})
				})
				
				$(function(){
					$('#add').validate({
						names : {
							rule : {
								required : true,
								minlen:2
							},
							error :{
								required : '收货人姓名必须填写',
								minlen:'用户名不得少于2位'
							},
							success:'ok',
							message:'请填写收货人姓名'
						},
						phone : {
							rule : {
								required : true,
								minlen:2,
								phone:true
							},
							error :{
								required : '收货人手机必须填写',
								minlen:'用户名不得少于2位',
								phone:'手机格式不正确'
							},
							success:'ok',
							message:'请填写收货人手机'
						},
						xiangxi : {
							rule : {
								required : true,
								minlen:3
							},
							error :{
								required : '详细地址必须填写',
								minlen:'用户名不得少于3位'
							},
							success:'ok',
							message:'请填写详细地址街道'
						},
					})
				})
				//点击显示添加地址
				$(function(){
					$('.xindizhi').click(function(){
						$('.dizhi').show();
					})
				})
				//点击触发提交订单的单击事件
				$(function(){
					$('.sub').click(function(){
						$('.dingdan').click();
					})
				})
		</script>
		<!--子导航开始-->
		<div class="subnav">
			<a href="<?php echo U('Index/index');?>">首页</a>&nbsp<i>/</i>&nbsp
			<span>我的OPPO</span>
		</div>
		<!--子导航结束-->
		<!--配送地址内容开始-->
		<div class="user_cont">
			<div class="user_cont1">
				<h2>配送地址</h2>
				<ul>
					<li><a href="<?php echo U('Index/User/index');?>">个人首页</a></li>
					<li><a href="<?php echo U('Index/User/porfile');?>">账户信息</a></li>
					<li><a href="<?php echo U('Index/User/orders');?>">我的订单</a></li>
					<li><a href="<?php echo U('Index/User/addresses');?>" style="color: #393939;border-bottom: 2px solid #2AAD6F;">配送地址</a></li>
				</ul>
			</div>
			<div class="addresses">
				<h4>我们默认首选顺丰快递，如收货地址顺丰快递不能送达，我们会更改为EMS快递为您配送。</h4>
				<!--没有地址的情况-->
				<!--<a class="xindizhi" href="">添加新地址</a>-->
				<!--有地址的情况-->
				<?php foreach ($adress as $k=>$v){?>
				<div class="adress">
					<input type="radio" name="id" id="" value="<?php echo $v['id'];?>" />
					<div class="adress_con">
						<h4><?php echo $v['adress'];?></h4>
						<span><?php echo $v['names'];?></span><br />
						<span><?php echo $v['phone'];?></span><br />
						<!--<span>222</span>-->
					</div>
					<a class="del" href="<?php echo U('User/del',array('id'=>$v['id']));?>">X</a>
				</div>
				<?php }?>
				<a class="xindizhi" href="javascript:;">添加新地址</a>
				<!--有地址的情况-->
					<div class="dizhi">
						<form id="add" action="<?php echo U('User/add');?>" method="post">
							<span>*收货人姓名</span><br />
							<input name="names" type="text" id="" placeholder="请填写收货人姓名" /><br />
							<span>*手机号码</span><br />
							<input name="phone" type="text" id="" placeholder="请填写手机号" /><br />
							<span>*收货人地址</span><br />
							<select id="s1" name="province">
								<option>省份</option>
							</select>
							<select id="s2" name="city">
								<option>地级市</option>
							</select>
							<select id="s3" name="county">
								<option>市、县级市、县</option>
							</select><br />
							<input type="text" name="xiangxi" class="xiangxi" id="" placeholder="请填写详细街道" style="margin-top: 8px;"/><br />
							<span>电子邮箱</span><br />
							<input type="text" name="email" id="" placeholder="请填写邮箱" /><br />
							<input class="tijiao" name="tijiao" type="submit" value="添加地址"/ style="margin-top: 10px;">
						</form>
					</div>
			</div>
		</div>	
		<!--配送地址内容结束-->
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
