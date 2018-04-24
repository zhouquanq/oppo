<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<script src="http://localhost/oppo/Static/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
	<script src="http://localhost/oppo/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript">
		$(function(){
    		//所有子集分类隐藏
    		$('tr[spid!=0]').hide();
    		//点击展开和收缩
    		$('.click-btn').toggle(function(){
    			//获得sid
    			var sid = $(this).parents('tr').attr('sid');
    			//子分类显示
    			$('tr[spid='+sid+']').show();
    			//删除+变成-
    			$(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
    		},function(){
    			//获得sid
    			var sid = $(this).parents('tr').attr('sid');
    			//异步
    			$.ajax({
    				type:"post",
    				url:"<?php echo U('Admin/Category/getSon');?>",
    				data:{sid : sid},
    				dataType:'json',
    				success:function(phpData){
    					$.each(phpData, function(k,v) {    
    						//让所有子集分类的tr隐藏
    						$('tr[sid='+v+']').hide();                                                        
    					});
    				}
    			});
    			
    			//删除-变成+
    			$(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
    		})
    		
    	})
	</script>
</head>

<body>
	
	<table class="hd-table hd-table-list">
		<tr>
			<td class="th" colspan="20">分类列表</td>
		</tr>
		<tr spid=0 class="tableTop">
			<td width="30"></td>
			<td class="tdLittle1">分类ID</td>
			<td>属性名称</td>
			<td>操作</td>
		</tr>
		
		<?php foreach ($data as $k=>$v){?>
		<tr spid="<?php echo $v['spid'];?>" sid="<?php echo $v['sid'];?>">
			<td width="30">
        		<a href="javascript:;" class="glyphicon glyphicon-plus click-btn"></a>
        	</td>
			<td><?php echo $v['sid'];?></td>
			<td><?php echo $v['_name'];?></td>
			<td>
				<a href="<?php echo U('Admin/Category/addson',array('sid'=>$v['sid']));?>" class="hd-btn hd-btn-default hd-btn-xm">添加子分类</a>
				<a href="<?php echo U('Admin/Category/edit',array('sid'=>$v['sid'],'poid'=>$v['oppo_type_tid']));?>" class="hd-btn hd-btn-primary hd-btn-xm">修改</a>
				<a href="javascript:modal(<?php echo $v['sid'];?>);" class="hd-btn hd-btn-danger hd-btn-xm">删除</a>
			</td>
		</tr>
		<?php }?>
	</table>
	<script type="text/javascript">
    	 function modal(sid) {
	        hd_modal({
	            width: 300,//宽度
	            height: 150,//高度
	            title: '确认删除吗？',//标题
	            content: '',//提示信息
	            button: true,//显示按钮
	            button_success: "确定",//确定按钮文字
	            button_cancel: "取消",//关闭按钮文字
	            timeout: 0,//自动关闭时间 0：不自动关闭
	            shade: true,//背景遮罩
	            shadeOpacity: 0.4,//背景透明度
	            success: function () {//点击确定后的事件
					location.href="<?php echo U('Admin/Category/del');?>" + "&sid=" + sid;
	            },
	            cancel: function () {//点击关闭后的事件
					
	            }
	        });
	    }
    </script>
</body>
</html>