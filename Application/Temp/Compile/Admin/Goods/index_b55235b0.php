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
			<td class="th" colspan="20">商品列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">商品ID</td>
			<td>商品名称</td>
			<td>商品价格</td>
			<td>库存</td>
			<td>点击次数</td>
			<td>上架时间</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $k=>$v){?>
		<tr>
			<td><?php echo $v['gid'];?></td>
			<td><?php echo $v['gname'];?></td>
			<td><?php echo $v['price'];?></td>
			<td><?php echo $v['gnumber'];?></td>
			<td><?php echo $v['gclick'];?></td>
			<td><?php echo date('Y-m-d H:i:s',$v['addtime']);?></td>
			<td>
				<a href="<?php echo U('Admin/Goods/hindex',array('gid'=>$v['gid'],'tid'=>$v['type_tid']));?>" class="hd-btn hd-btn-default hd-btn-xm">货品列表</a>
				<a href="<?php echo U('Admin/Goods/edit',array('gid'=>$v['gid']));?>" class="hd-btn hd-btn-primary hd-btn-xm">修改</a>
				<a href="<?php echo U('Admin/Goods/del',array('gid'=>$v['gid']));?>" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	
	</table>
</body>
</html>