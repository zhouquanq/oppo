<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="hd-table hd-table-list" >
			<tr >
				<td>品牌名称</td>
				<td><input type="text" name="bname" /></td>
			</tr>
			<tr>
				<td>品牌LOGO</td>
				<td><input type="file" name="logo" /></td>
			</tr>
			<tr>
				<td>是否热门</td>
				<td>
					<input type="radio" value="1" name="is_hot" />是
					<input type="radio" value="0" checked="checked" name="is_hot" />否
				</td>
				
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="添加品牌" class="hd-btn hd-btn-default hd-btn-xm"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>