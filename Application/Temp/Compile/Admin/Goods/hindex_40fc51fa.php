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
			<td class="th" colspan="20">货品列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">货品ID</td>
			<?php foreach ($spec as $k=>$v){?>
			<td><?php echo $v['attr_name'];?></td>
			<?php }?>
			<td>库存</td>
			<td>货号</td>
			<td>操作</td>
		</tr>
		<?php foreach ($listdata as $k=>$v){?>
			<td><?php echo $v['glid'];?></td>
			<?php foreach ($v['spec'] as $kk=>$vv){?>
			<td><?php echo $vv;?></td>
			<?php }?>
			<td><?php echo $v['goods_sn'];?></td>
			<td><?php echo $v['gnumber'];?></td>
			<td>
				<a href="<?php echo U('Admin/Goods/dell',array('glid'=>$v['glid']));?>" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	</table>
	<form action="<?php echo U('Admin/Goods/addl');?>" method="post">
		添加货品：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		
		<?php foreach ($spec as $k=>$v){?>
		<?php echo $v['attr_name'];?>
		<select name="combine[]">
			<option value="0">-请选择-</option>
			<?php foreach ($v['option'] as $kk=>$vv){?>
				<option value="<?php echo $vv['gtid'];?>" tid=""><?php echo $vv['gtvalue'];?></option>
			<?php }?>
		</select>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<?php }?>
		
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp库存
		<input type="text" name="goods_sn" id="" value="" />
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp货号
		<input type="text" name="gnumber" id="" value="" /><br />
		
		<input type="hidden" name="goods_gid" id="goods_gid" value="<?php echo $hd['get']['gid'];?>" />
		<input type="submit" class="hd-btn hd-btn-primary" value="添加货品"/>
	</form>
</body>
</html>