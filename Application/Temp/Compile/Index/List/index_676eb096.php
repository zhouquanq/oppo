<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>OPPO商品列表</title>
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
			<span>商品列表</span>
		</div>
		<!--子导航结束-->
		<!--分类开始部份-->
		<div class="sort">
			<!--<div class="sort_top">
				<div class="sort_top_sort">
					<a href=""><img src="http://localhost/oppo/Application/Index/View/Public/images/list.1.jpg"/></a>
					<p style="display: block;"></p>
				</div>
				<div class="sort_top_sort">
					<a href=""><img src="http://localhost/oppo/Application/Index/View/Public/images/list.2.jpg"/></a>
					<p></p>
				</div>
				<div class="sort_top_sort">
					<a href=""><img src="http://localhost/oppo/Application/Index/View/Public/images/list.3.jpg"/></a>
					<p></p>
				</div>
				<div class="sort_top_sort">
					<a href=""><img src="http://localhost/oppo/Application/Index/View/Public/images/list.4.jpg"/></a>
					<p></p>
				</div>
				<div class="sort_top_sort">
					<a href=""><img src="http://localhost/oppo/Application/Index/View/Public/images/list.5.jpg"/></a>
					<p></p>
				</div>
				<div class="sort_top_sort">
					<img src="http://localhost/oppo/Application/Index/View/Public/images/list.6.jpg"/>
				</div>
			</div>-->
			<div class="sort_bottom">
				<ul>
					<?php foreach ($tempFinalAttr as $k=>$v){?>
					<li class="attr-border">
						<span><?php echo $v['name'];?>：</span>
						<ul class="attr-content">
							<?php 
								$temp = $param;
								$temp[$k] = 0;
							 ?>
							<li>
								<a href="<?php echo U('List/index',array('sid'=>$_GET['sid'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class="hover"<?php } ?>>全部</a>
							</li>
							<?php foreach ($v['value'] as $kk=>$vv){?>
								<?php 
									$temp[$k] = $vv['gtid'];
								 ?>
							<li>
								<a href="<?php echo U('List/index',array('sid'=>$_GET['sid'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==$vv['gtid']){ ?>class="hover"<?php } ?>><?php echo $vv['gtvalue'];?></a>
							</li>
							<?php }?>
						</ul>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!--分类部份结束-->
		<!--商品列表开始-->
		<div class="list_content">
			<div class="list_content_top">
				<!--<div class="list_title">
					<a style="color: #2AAD6F;" href="">默认</a>
					<a href="">价格</a>
					<a href="">最新</a>
				</div>-->
				    <?php if(!$goods){ ?>
				<div class="list_no">
					    <?php if($_GET['sid']==19){ ?>
					<h2>当前没有商品符合筛选条件，请查看<a href="<?php echo U('List/index',array('sid'=>19));?>">全部手机</a>。</h2>
					<?php } ?>
					    <?php if($_GET['sid']==22){ ?>
					<h2>当前没有商品符合筛选条件，请查看<a href="<?php echo U('List/index',array('sid'=>22));?>">全部配件</a>。</h2>
					<?php } ?>
				</div>
				<?php }else{ ?>
				<div class="list_box">
					<?php foreach ($goods as $k=>$v){?>
					<div class="list_con">
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><img class="" src="http://localhost/oppo/<?php echo $v['lest_img'];?>"/></a>
						<div class="note">
							<a href=""><?php echo $v['gname'];?></a><br />
							<span class="price">￥<?php echo $v['price'];?>.00</span>
						</div>
					</div>
					<?php }?>
				</div>
				<?php } ?>
			</div>
			
			
			<!--分页开始-->
			<div class="page">
				<?php echo $page;?>
			</div>
			<!--分页结束-->
			<!--最近浏览开始-->
			<?php if(isset($history)) {?>
			<div class="recent">
				<h2>您最近浏览过的产品</h2>
				<div class="rectent_box">
					<?php foreach ($history as $k=>$v){?>
					<div class="rectent_box_con">
						<a href="<?php echo U('Products/index',array('gid'=>$v['gid']));?>"><img src="http://localhost/oppo/<?php echo $v['lest_img'];?>" alt="" /></a>
						<div class="rectent_box_content">
							<a href=""><?php echo $v['gname'];?></a>
							<span>￥<?php echo $v['price'];?>.00</span>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<?php } ?>
			<!--最近浏览结束-->
		</div>
		<!--商品列表结束-->
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
