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
			<td class="th" colspan="20">属性列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">属性ID</td>
			<td>属性名称</td>
			<td>属性类别</td>
			<td>属性值</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $k=>$v){?>
		<tr>
			<td><?php echo $v['attr_id'];?></td>
			<td><?php echo $v['attr_name'];?></td>
			<td>    <?php if($v['attr_type']==1){ ?>规格<?php }else{ ?>属性<?php } ?></td>
			<td><?php echo $v['attr_value'];?></td>
			<td>
				<a href="<?php echo U('Admin/Attr/edit',array('atid'=>$v['attr_id'],'attr_type_tid'=>$v[attr_type_tid]));?>" class="hd-btn hd-btn-primary hd-btn-xm">修改</a>
				<a href="<?php echo U('Admin/Attr/out',array('atid'=>$v['attr_id']));?>" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	
	</table>
	<a href="<?php echo U('Admin/Attr/add',array('tid'=>$_GET['tid']));?>" class="hd-btn hd-btn-default hd-btn-sm">添加属性</a>
</body>
</html>