<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>OPPO商品页</title>
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
				//规格选择
				$('.fenlei1_1 a').first().addClass('zhong');
				$('.fenlei1_1 a').click(function(){
					$(this).parents('div.fenlei1').find('a').removeClass('zhong');
					$(this).addClass('zhong');
					if($('.zhong').length>=1){
						var id = '';
						$.each($('.zhong'), function() {    
							id += $(this).attr('specId') + ',';
							
						});
						//alert(id);
						$.ajax({
							type:"post",
							url:"<?php echo U('Index/Products/_type');?>",
							data:{id : id},
							dataType:'json',
							success:function(phpData){
								var attr = '';
								$.each(phpData,function(k,v) {
									attr += '<input type="hidden" name="attr[]" value='+ v.gtvalue +' />'
								});
								$('#aja').html(attr);
							}
						});
					} 
				})
			})
		</script>
		<!--子导航开始-->
		<div class="subnav">
			<a href="<?php echo U('Index/index');?>">首页</a>&nbsp<i>|</i>&nbsp
			<span>商品列表</span>&nbsp<i>|</i>&nbsp
			<span><?php echo $good['gname'];?></span>
		</div>
		<!--子导航结束-->
		<div class="shangpin">
			<div class="shangpin_box animated bounceInDown">
				<div class="img">
					<div class="imgbox">
						<?php foreach ($big as $k=>$v){?>
						<img src="http://localhost/oppo/<?php echo $v;?>"/>
						<?php }?>
					</div>
				</div>
				<ul>
					<?php foreach ($small as $k=>$v){?>
					<a href="javascript:;"><li><img src="http://localhost/oppo/<?php echo $v;?>" alt="" /></li></a>
					<?php }?>
				</ul>
				<div class="xiangq">
					<h2><?php echo $good['gname'];?></h2>
					<span><?php echo $good['good_detail'];?></span>
					<span class="jia">￥<?php echo $good['price'];?>.00</span>
				</div>
				<div class="fenlei">
					<?php foreach ($spec as $k=>$v){?>
					<div class="fenlei1">
						<span><?php echo $v['attr_name'];?></span>
						<div class="fenlei1_1">
							<?php foreach ($v['option'] as $kk=>$vv){?>
							<a href="javascript:;" specId="<?php echo $vv['gtid'];?>"><?php echo $vv['gtvalue'];?></a>
							<?php }?>
						</div>
					</div>
					<?php }?>
					<!--<div class="fenlei4">
						<span>赠品</span>
						<div class="fenlei4_1">
							<img src="http://localhost/oppo/Application/Index/View/Public/images/mai1.jpg" alt="" />
							<a class="zeng1" href="">iLIKE 5200mAh O萌移 动电源 BY503 红</a><br />
							<img src="http://localhost/oppo/Application/Index/View/Public/images/mai2.jpg" alt="" />
							<a class="zeng2" href="">QCY 大咖蓝牙耳机 J134 黄黑</a>
						</div>
					</div>
					<div class="fenlei5">
						<span>服务</span>
						<div class="fenlei5_1">
							<a href="">
								<span class="yan">延</span>
								<span class="yanshi">延保半年￥59</span>
							</a>
							<a href="">
								<span class="yan">延</span>
								<span class="yanshi">延保一年￥99</span>
							</a>
							<a href="">
								<span class="yan">碎</span>
								<span class="yanshi">屏碎保一年￥99</span>
							</a>
							<a class="liaojie" href="">了解详情>></a><br />
							<div class="baoxian">
								<span>购买保险服务表示您已同意</span>
								<a href="">《OPPO保障服务条款》</a>
							</div>
						</div>	
					</div>-->
					<form action="<?php echo U('Products/shop');?>" method="post">
						<div class="fenlei6">
							<div class="fenlei6_left">
								<a class="jian" href="javascript:;">-</a>
								<input class="shuliang" type="text" name="num" id="" value="1" />
								<a class="jia" href="javascript:;">+</a>
								<!--<span>库存件</span>-->
							</div>
							<div class="fenlei6_right">
								<i id="aja"></i>
								<input type="hidden" name="img" id="" value="<?php echo $good['lest_img'];?>" />
								<input type="hidden" name="gid" id="" value="<?php echo $good['gid'];?>" />
								<input type="hidden" name="price" id="" value="<?php echo $good['price'];?>" />
								<input type="hidden" name="name" id="" value="<?php echo $good['gname'];?>" />
								<input type="submit" value="加入购物车"/>
							</div>
						</div>
						
					</form>
					<div class="fenlei7">
						<img src="http://localhost/oppo/Application/Index/View/Public/images/111.png" alt="" />
						<span>79元起包邮</span>
						<img src="http://localhost/oppo/Application/Index/View/Public/images/222.png" alt="" />
						<span>7天包推30天包换</span>
						<img src="http://localhost/oppo/Application/Index/View/Public/images/333.png" alt="" />
						<span>分期付款</span>
						<img src="http://localhost/oppo/Application/Index/View/Public/images/444.png" alt="" />
						<span>购物返积分</span>
					</div>
				</div>
			</div>
		</div>
		<div class="shangpin_cont">
			<p></p>
			<div class="shangpin_cont_top">
				<a style="background: #409F73; color: #fff;" href="">商品详情</a>
				<a href="">规格参数</a>
				<a href="">用户评价</a>
			</div>
			<div class="shangp_cont_con">
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont1.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont2.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont3.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont4.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont5.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont6.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont7.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont8.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont9.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont10.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont11.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont12.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont13.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont14.jpg"/>
				<img src="http://localhost/oppo/Application/Index/View/Public/images/spcont15.jpg" style="padding-bottom: 60px;"/>
			</div>
		</div>
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
