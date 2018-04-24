<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>个人中心-账户信息</title>
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
		<script type="text/javascript">
			$(function(){
				$('.edit').click(function(){
					$('.user_box').show();
					$('.alter').hide();
				})
			})
		</script>
		<!--子导航开始-->
		<div class="subnav">
			<a href="<?php echo U('Index/index');?>">首页</a>&nbsp<i>/</i>&nbsp
			<span>我的OPPO</span>
		</div>
		<!--子导航结束-->
		<!--个人中心内容开始-->
		<div class="user_cont">
			<div class="user_cont1">
				<h2>账户信息</h2>
				<ul>
					<li><a href="<?php echo U('Index/User/index');?>">个人首页</a></li>
					<li><a href="<?php echo U('Index/User/porfile');?>" style="color: #393939;border-bottom: 2px solid #2AAD6F;">账户信息</a></li>
					<li><a href="<?php echo U('Index/User/orders');?>">我的订单</a></li>
					<li><a href="<?php echo U('Index/User/addresses');?>">配送地址</a></li>
				</ul>
			</div>
			<!--<div class="eml">
				<div class="eml_con">
					<h5>绑定您的邮箱，即使接受 OPPO活动咨询</h5>
					<span class="youxiang">联系邮箱:</span><br />
					<input type="text" class="emal" name="" id="" value="" /><a href="">验证邮箱</a>
				</div>
			</div>-->
			<div class="geren">
				<span class="user">*用户名：<?php echo $user['username'];?></span>
				<span class="sex">性别：<?php echo $user['sex'];?></span><br />
				<span class="birthday">生日：<?php echo $user['birthday'];?></span>
			</div>
			<form action="<?php echo U('User/edituser');?>" method="post" name=form1>
			<div class="user_box">
				<span>用户名：</span>
				<input class="u" type="text" name="username" id="" value="<?php echo $user['username'];?>" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<span>性别：</span>
				<select name="sex">
					<option value="">-请选择-</option>
					<option value="男">男</option>
					<option value="男">女</option>
				</select><br />	
				<span>生日</span>
				<select name=YYYY onchange="YYYYMM(this.value)">
				<option value="">年</option>
				</select>
				<select name=MM onchange="MMDD(this.value)">
				<option value="">月</option>
				</select>
				<select name=DD>
				<option value="">日</option>
				</select>
				<br />
				<input type="hidden" name="uid" id="" value="<?php echo $user['uid'];?>" />
				<input type="submit" class="gai" value="修改"/>
			</div>
			</form>
			<div class="alter">
				<a class="edit" href="javascript:;">修改</a>
			</div>
			<div  class="porfile_right">
				<form action="<?php echo U('Index/User/porfile');?>" method="post">
					<span>当前密码</span><br />
					<input class='psd' type="password" name="pasd" id="" value="zhouquan" />
					<input class="gai" type="submit" value="修改"/>
				</form>
			</div>
		</div>
		<!--个人中心内容结束-->
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
		<script language="JavaScript">
window.onload = function(){
strYYYY = document.form1.YYYY.outerHTML;
strMM = document.form1.MM.outerHTML;
strDD = document.form1.DD.outerHTML;
MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

//先给年下拉框赋内容
var y = new Date().getFullYear();
var str = strYYYY.substring(0, strYYYY.length - 9);
for (var i = (y-30); i < (y+30); i++) //以今年为准，前30年，后30年
{
str += "<option value='" + i + "'> " + i + "</option>\r\n";
}
document.form1.YYYY.outerHTML = str +"</select>";

//赋月份的下拉框
var str = strMM.substring(0, strMM.length - 9);
for (var i = 1; i < 13; i++)
{
str += "<option value='" + i + "'> " + i + "</option>\r\n";
}
document.form1.MM.outerHTML = str +"</select>";

document.form1.YYYY.value = y;
document.form1.MM.value = new Date().getMonth() + 1;
var n = MonHead[new Date().getMonth()];
if (new Date().getMonth() ==1 && IsPinYear(YYYYvalue)) n++;
writeDay(n); //赋日期下拉框
document.form1.DD.value = new Date().getDate();
}
function YYYYMM(str) //年发生变化时日期发生变化(主要是判断闰平年)
{
var MMvalue = document.form1.MM.options[document.form1.MM.selectedIndex].value;
if (MMvalue == ""){DD.outerHTML = strDD; return;}
var n = MonHead[MMvalue - 1];
if (MMvalue ==2 && IsPinYear(str)) n++;
writeDay(n)
}
function MMDD(str) //月发生变化时日期联动
{
var YYYYvalue = document.form1.YYYY.options[document.form1.YYYY.selectedIndex].value;
if (str == ""){DD.outerHTML = strDD; return;}
var n = MonHead[str - 1];
if (str ==2 && IsPinYear(YYYYvalue)) n++;
writeDay(n)
}
function writeDay(n) //据条件写日期的下拉框
{
var s = strDD.substring(0, strDD.length - 9);
for (var i=1; i<(n+1); i++)
s += "<option value='" + i + "'> " + i + "</option>\r\n";
document.form1.DD.outerHTML = s +"</select>";
}
function IsPinYear(year)//判断是否闰平年
{ return(0 == year%4 && (year%100 !=0 || year%400 == 0))}
//--></script>
	</body>
</html>
