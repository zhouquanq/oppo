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
			<td class="th" colspan="20">品牌列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">品牌ID</td>
			<td>品牌名称</td>
			<td>LOGO</td>
			<td>是否热门</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $k=>$v){?>
		<tr>
			<td><?php echo $v['bid'];?></td>
			<td><?php echo $v['bname'];?></td>
			<td><img src="http://localhost/oppo/<?php echo $v['logo'];?>" alt="" /></td>
			<td>    <?php if($v['is_hot']==1){ ?>是<?php }else{ ?>否<?php } ?></td>
			<td>
				<a href="<?php echo U('Admin/Brand/out',array('bid'=>$v['bid']));?>" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	
	</table>
</body>
</html>