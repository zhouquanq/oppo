<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="http://localhost/oppo/Application/Admin/View/Login/Css/login.css" />
	<script type="text/javascript" src="http://localhost/oppo/Application/Admin/View/Login/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/oppo/Application/Admin/View/Login/Js/login.js"></script>
	<title></title>
</head>
<body>
	<div id="divBox">
		<form action="" method="POST" id="login">
			<input type="text" id="userName" name="username"/>
			<input type="password" id="psd" name="password"/>
			<input type="" value="" id="verify" name="code"/>
			<input type="submit" id="sub" value=""/>
			<img src="<?php echo U('Admin/Login/code');?>" id="verify_img" />
		</form>
		<div class="four_bj">
			
			<p class="f_lt"></p>
			<p class="f_rt"></p>
			<p class="f_lb"></p>
			<p class="f_rb"></p>
		</div>

		<ul id="peo">
			
		</ul>
		<ul id="psd">
			
		</ul>
		<ul id="ver">
			
		</ul>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="http://localhost/oppo/Application/Admin/View/Login/Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('form','background');
    </script>
<![endif]-->
</body>
</html>