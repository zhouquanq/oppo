<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>	
</head>

<body>
	
	<table class="hd-table hd-table-list">
		<tr>
			<td class="th" colspan="20">订单列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">订单ID</td>
			<td>商品名</td>
			<td>购买者</td>
			<td>购买数量</td>
			<td>购买价格</td>
			<td>订单状态</td>
			<td></td>
		</tr>
		<?php foreach ($list as $k=>$v){?>
		<tr>
			<td><?php echo $v['lid'];?></td>
			<td><?php echo $v['gname'];?></td>
			<td><?php echo $v['names'];?></td>
			<td><?php echo $v['num'];?></td>
			<td><?php echo $v['price'];?></td>
			<td>    <?php if($v['status']==0){ ?>未付款<?php } ?>
				    <?php if($v['status']==1){ ?>已付款<?php } ?>
				    <?php if($v['status']==2){ ?>已收货<?php } ?>
				    <?php if($v['status']==3){ ?>交易完成<?php } ?>&nbsp&nbsp
				    <?php if($v['status']==1){ ?><a href="<?php echo U('Order/fahuo',array('lid'=>$v['lid']));?>" class="hd-btn hd-btn-danger hd-btn-xm">请发货</a><?php } ?>
			</td>
		</tr>
		<?php }?>
	
	</table>
</body>
</html>