<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
</head>
<body>
	<form action="" method="post">
		<table class="hd-table hd-table-list">
			<tr >
				<td>属性名称</td>
				<td><input type="text" name="attr_name" value="<?php echo $olddata['attr_name'];?>"/></td>
			</tr>
			<tr>
				<td>属性类别</td>
				<td>
					<input type="radio" name="attr_type" id="" value="0" />	属性				
					<input type="radio" name="attr_type" id="" value="1" />	规格
				</td>
			</tr>
			<tr>
				<td>属性值</td>
				<td><input type="text" name="attr_value" value="<?php echo $olddata['attr_value'];?>"/> &nbsp&nbsp多个属性值请用，号隔开</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="hidden" name="attr_type_tid" id="" value="<?php echo $_GET['attr_type_tid'];?>" />
					<input type="submit" value="修改属性" class="hd-btn hd-btn-default hd-btn-xm"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>