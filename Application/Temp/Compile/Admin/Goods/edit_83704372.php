<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/oppo/Static/hdjs/hdjs.css"/>
	<!--载入uploadify相关文件-->
	<script type="text/javascript" src="http://localhost/oppo/Static/uploadify/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/oppo/Static/uploadify/jquery.uploadify.min.js"></script>
	<link href="http://localhost/oppo/Static/uploadify/uploadify.css" type="text/css" rel="stylesheet"></link>
	<script type="text/javascript" charset="utf-8" src="http://localhost/oppo/Static/ueditor1_4_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://localhost/oppo/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="http://localhost/oppo/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
	<!--异步调取规格和属性-->
	<script type="text/javascript">
		$(function(){
			$('select[name=category_sid]').change(function(){
				//获得选中的option的类型tid
				var tid = $(':selected').attr('tid');
				$.ajax({
					type:"post",
					url:"<?php echo U('getAttrSpec');?>",
					data:{tid : tid},
					dataType:'json',
					success:function(phpData){
						//属性
						var attr = '';
						//规格
						var spec = '';
						$.each(phpData, function(k,v) {    
							//如果是属性(不可选)	
							if(v.attr_type == 0){
							  	attr += '<tr><td>'+v.attr_name+'</td><td><select name="attr_id['+v.attr_id+']"><option value="0">请选择</option>';
							  	$.each(v.attr_value, function(kk,vv) {    
							  		attr += '<option value="'+vv+'">' + vv + '</option>';                                                          
							  	});
							  	attr += '</select></td></tr>';
							}else{
								spec += '<tr><td>'+v.attr_name+'</td><td><select name="spec_id['+v.attr_id+'][value][]"><option>请选择</option>';
							  	$.each(v.attr_value, function(kk,vv) {    
							  		spec += '<option>' + vv + '</option>';                                                          
							  	});
							  	spec += '</select></td><td><a class="add-spec" href="javascript:;">增加一项</a></td></tr>';
							}
						});
						
						$('#attr').html(attr);
						$('#spec').html(spec);
						
					}
				});
			})
			
			//添加一个规格
			$('.add-spec').live('click', function () {
				var tr = $(this).parents('tr');
				var obj = tr.clone();
				var del = '<a class="del-spec" href="javascript:;">删除一项</a>';
				obj.find('td').eq(2).find('.add-spec').remove();
				obj.find('td').eq(2).append(del);
				tr.after(obj);
			});
		
			//删除一个规格
			$('.del-spec').live('click', function() {
				$(this).parents('tr').remove();
			});
			
			//上传列表图
			 $('#file').uploadify({
	             'formData'     : {//POST数据
	                '<?php echo session_name();?>' : '<?php echo session_id();?>',
	             },
	             'fileTypeDesc' : '上传文件',//上传描述
	             'fileTypeExts' : '*.jpg;*.png',
	             'swf'      : 'http://localhost/oppo/Static/uploadify/uploadify.swf',
	             'uploader' : '<?php echo U("uploadl");?>',
	             'buttonText':'选择文件',
	             'fileSizeLimit' : '2000KB',
	             'uploadLimit' : 1000,//上传文件数
	             'width':65,
	             'height':25,
	             'successTimeout':10,//等待服务器响应时间
	             'removeTimeout' : 0.2,//成功显示时间
	             'onUploadSuccess' : function(file, data, response) {
		             data=$.parseJSON(data);
		             var imageUrl = data.image?data.url:'http://localhost/oppo/Static/image/default.png';
		             var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' style='width:100px;heigth:100px;'/><a href='javascript:;' style='color:red' class='del-img'>X</a>";
		             //把地址放到隐藏域，这样可以提交到服务器了
		             li += '<input type="hidden" name="lest_img" value="'+data.path+'"/>';
		             li += '</li>';
		             $("#uploadList ul").prepend(li);
	             }
		    });
		    
		    //上传商品图
			 $('#pic').uploadify({
	             'formData'     : {//POST数据
	                '<?php echo session_name();?>' : '<?php echo session_id();?>',
	             },
	             'fileTypeDesc' : '上传文件',//上传描述
	             'fileTypeExts' : '*.jpg;*.png',
	             'swf'      : 'http://localhost/oppo/Static/uploadify/uploadify.swf',
	             'uploader' : '<?php echo U("upload");?>',
	             'buttonText':'选择文件',
	             'fileSizeLimit' : '2000KB',
	             'uploadLimit' : 1000,//上传文件数
	             'width':65,
	             'height':25,
	             'successTimeout':10,//等待服务器响应时间
	             'removeTimeout' : 0.2,//成功显示时间
	             'onUploadSuccess' : function(file, data, response) {
		         	data=$.parseJSON(data);
	                    var imageUrl = data.image?data.url:'http://localhost/oppo/Static/image/default.png';
	                    var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' style='width:100px;heigth:100px;'/><a href='javascript:;' style='color:red;text-decoration:none;' class='del-img'>X</a>";
	                    li += '<input type="hidden" name="small[]" value="'+data.small+'"/>';
	                    li += '<input type="hidden" name="url[]" value="'+data.url+'"/>';
	                    li += '<input type="hidden" name="big[]" value="'+data.big+'"/>';
	                    li += '</li>';
	                    $("#uploadList1 ul").prepend(li);
	             }
		    });
		    
		    //点击x删除图片
			$('.del-img').live('click',function(){
				var liObj = $(this).parents('li');
				//找到父级li里面的地址
				var path = liObj.attr('path');
				//发异步到服务器删除
				$.ajax({
					type:"post",
					url:"<?php echo U('delImg');?>",
					data:{path:path},
					success:function(data){
						//移除图片
						liObj.remove();
					}
				});
			})
			
			//点击x删除图片
			$('.del').live('click',function(){
				var liObj = $(this).parents('li');
				//找到父级li里面的地址
				var path = liObj.attr('path');
				//发异步到服务器删除
				$.ajax({
					type:"post",
					url:"<?php echo U('delImg');?>",
					data:{path:path},
					success:function(data){
						//移除图片
						liObj.remove();
					}
				});
			})
			
			$('.delimgl').click(function(){
     			$(this).parents('td').html('<input type="file" name="thumb" id="" />');
     		})
			
			$('.delimgr').click(function(){
     			$(this).parents('td').html('<input type="file" name="thumb" id="" />');
     		})
     		
     	
		})

	</script>
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">
	<form action="<?php echo U('Admin/Goods/edit');?>" method='post'>
			<h2 class="hd-title-header">添加商品</h2>
			<table class='hd-table hd-table-form'>
				<thead>
					<tr>
						<th colspan="2" class="btn btn-primary">基本信息</th>
					</tr>
				</thead>
				<tbody>
					<tr class="info">
						<td>所属分类</td>
						<td>
							<select name="category_sid">
								<option value="0"><?php echo $olddata['tname'];?></option>
								<?php foreach ($cateData as $k=>$v){?>
									<option value="<?php echo $v['sid'];?>" tid="<?php echo $v['oppo_type_tid'];?>"><?php echo $v['_name'];?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr class="info">
						<td>商品名称</td>
						<td>
							<input type="text" name='gname' value="<?php echo $olddata['gname'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>单位</td>
						<td>
							<input type="text" name='gnumber' value='<?php echo $olddata['gnumber'];?>'/>
						</td>
					</tr>
					<tr class="info">
						<td>商品价格</td>
						<td>
							<input type="text" name='price' value="<?php echo $olddata['price'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>附加价格</td>
						<td>
							<input type="text" name='attr_price' value="<?php echo $olddata['attr_price'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>点击次数</td>
						<td>
							<input type="text" name='gclick' value="<?php echo $olddata['gclick'];?>"/>
						</td>
					</tr>
				</tbody>
			</table>

			<p class="good_attr">商品属性</p>
			<table class="hd-table hd-table-form" id='attr'>
				
			</table>
			<p class="good_spec">商品规格</p>
			
			<table class="hd-table hd-table-form" id='spec'>
				<!--<?php foreach ($goodsattr as $k=>$v){?>
				<tr>
					<td>123</td>
					<td>
						<select name="category_sid">
							<option value="0"><?php echo $v['gtvalue'];?></option>
							<option value="" tid="">{$}</option>
						</select>
					</td>
					<br />
				</tr>
				<?php }?>-->
			</table>
			
			<p class="hd-title-header">列表图</p>
			<table class='hd-table hd-table-form'>
				<tr class="info">
					<td>上传图片</td>
					<td>
						 <input id="file" type="file" multiple="true" name="lest_img">
	           			 <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
	           			  <div id="uploadList">
	             			   <ul>
	 								<img src="http://localhost/oppo/<?php echo $olddata['lest_img'];?>" width="100px" height="100px" alt="" /><a href='javascript:;' style='color:red' class='delimgl'>X</a>
	              			  </ul>
	           			 </div>
					</td>
					<td id='pic-list'>
						
					</td>
				</tr>
			</table>
			<p class="hd-title-header">商品图册</p>
			<table class='hd-table hd-table-form'>
				<tr class="info">
					<td>上传图片</td>
					<td>
						<input id="pic" type="file" multiple="img">
	         		  	<span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
	            		<div id="uploadList1">
	             			   <ul>
	             			   	<?php foreach ($small as $k=>$v){?>
	             			   		<li>
	             			   			<img src="http://localhost/oppo/<?php echo $v;?>" width="100px" height="100px" alt="" /><a href='javascript:;' style='color:red' class='delimgr'>X</a>
	             			   		</li>
	              			  	<?php }?>
	             			   </ul>
	           			 </div>
					</td>
					<td id='photo-list'></td>
				</tr>
			</table>
			<p class="hd-title-header">商品详细</p>
			<table class='hd-table hd-table-form'>
				<tr class="hide info">
					<td>
						<script id="editor" type="text/plain" style="width:600px;height:200px;" name="servace"><?php echo $detaildata['servace'];?></script>
                     <script>
                     	var ue = UE.getEditor('editor');
                     </script>
					</td>
				</tr>
			</table>
			<p class="hd-title-header">售后服务</p>
			<table class='table'>
				<tr class="hide info">
					<td>
						<script id="editor1" type="text/plain" style="width:600px;height:200px;" name="good_detail"><?php echo $detaildata['good_detail'];?></script>
	                     <script>
	                     	var ue = UE.getEditor('editor1');
	                     </script>
					</td>
				</tr>
			</table>
			<input type="hidden" name="gid" id="" value="<?php echo $hd['get']['gid'];?>" />
			<input type="submit" value="确认添加" class="hd-btn hd-btn-primary" />
	</form>

	</div>
	</div>
	</div>
</body>
</html>