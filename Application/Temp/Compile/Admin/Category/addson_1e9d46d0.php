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
				<td class="th" colspan="2">添加子分类</td>
			</tr>
			<tr>
				<td>所属类型</td>
				<td>
					<select name="oppo_type_tid" class="w200">
                    	<option value="">请选择所属类型</option>
                    	<?php foreach ($data as $k=>$v){?>
                    	<option  value="<?php echo $v['tid'];?>"><?php echo $v['tname'];?></option>
                   		<?php }?>
                    </select>
				</td>
			</tr>
			<tr>
				<td>子分类名称</td>
				<td><input type="text" name="sname"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="spid" id="" value="<?php echo $hd['get']['sid'];?>" />
					<input type="submit" value="添加" class="hd-btn hd-btn-success hd-btn-xm"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>