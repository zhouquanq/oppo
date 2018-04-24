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
			<td class="th" colspan="20">类型列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">类型ID</td>
			<td>类型名称</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $k=>$v){?>
		<tr>
			<td><?php echo $v['tid'];?></td>
			<td><?php echo $v['tname'];?></td>
			<td>
				<a href="<?php echo U('Admin/Attr/index',array('tid'=>$v['tid']));?>" class="hd-btn hd-btn-default hd-btn-xm">查看属性</a>
				<a href="<?php echo U('Admin/Type/edit',array('tid'=>$v['tid']));?>" class="hd-btn hd-btn-primary hd-btn-xm">修改</a>
				<a href="<?php echo U('Admin/Type/del',array('tid'=>$v['tid']));?>" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	</table>

</body>
</html>