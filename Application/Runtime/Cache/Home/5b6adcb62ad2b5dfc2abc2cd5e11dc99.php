<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link href="/tp3/Public/css/style.css" rel="stylesheet" type="text/css"> 
<script src="/tp3/Public/Js/jquery.js"></script>
<script>
	$(function(){
		$('button').bind('click',function(){
			$.get('/tp3/index.php/Home/Login/getajax',function(data){
				alert(data);
			});
		});
		$('img[class="login"]').bind('click',function(){
			$('form[name="myform"]').submit();
		});
		$('img[class="register"]').click(function(){
			window.location="/tp3/index.php/home/Register/index";
		});
	});
</script>
</head>

<body>
	<form action="/tp3/index.php/Home/Login/dologin" method="post" name="myform">
		用户名：<input type="text" name="username"></input></br>
		密　码：<input type="password" name="password"></input></br>
		验证码：<input type="text" name="code"></input><img src="/tp3/index.php/Home/Login/Verify" onclick="this.src=this.src+'?'+Math.random()" /></br>
		<img class="login" src='/tp3/Public/images/b05.gif' /><img class="register" src='/tp3/Public/images/b04.gif' />
	</form>
</body>

</html>