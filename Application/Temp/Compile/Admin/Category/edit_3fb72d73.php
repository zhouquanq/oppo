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
				<td class="th" colspan="2">修改分类</td>
			</tr>
			    <?php if($oldData['spid'] != 0){ ?>
			<tr>
				<td>所属类型</td>
				<td>
					<select name="oppo_type_tid" class="w200">
                    	<option value=""><?php echo $typeData['tname'];?></option>
                    	<?php foreach ($data as $k=>$v){?>
                    	<option  value=""><?php echo $v['tname'];?></option>
                   		<?php }?>
                    </select>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>分类名称</td>
				<td><input type="text" name="sname" value="<?php echo $oldData['sname'];?>"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="sid" id="" value="<?php echo $hd['get']['sid'];?>" />
					<input type="submit" value="修改分类" class="hd-btn hd-btn-default hd-btn-xm"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>