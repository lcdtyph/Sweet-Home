<?php
	session_start();
	$islogin = false;
	if(!isset($_SESSION["userid"])){
		exit('<script>alert("请先登录");top.location="login.html";</script>');
	}
	include("conn.php");
	if(isset($_POST["submit"])){
		mysql_query("update user set gender = '{$_POST["gender"]}' where username = '{$_SESSION["username"]}';");
		mysql_query("update user set email = '{$_POST["email"]}' where username = '{$_SESSION["username"]}';");
		mysql_query("update user set area = '{$_POST["area"]}' where username = '{$_SESSION["username"]}';");
		exit('<script>alert("个人信息修改成功！");top.location="personalCenter.php";</script>');
	}
	$islogin = true;
	$oldInfo = mysql_fetch_array(mysql_query("select * from user where username='{$_SESSION["username"]}';"));
?>
<html>
	<head>
		<title>猫狗校园 SweetHome | 修改个人信息</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Play-Offs Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!meta charset utf="8">
		<!--bootstrap-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8" />
		<!--script-->
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--script-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
	</head>
	<body>
		<!--header-part-->
		<div class="banner-background" id="to-top">
			<div class="container">
				<div class="nav-back">
					<div class="navigation">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li><a href="index.php">HOME</a></li>
									<li><a href="track.php">TRACK </a></li>
									
									<li><a href="zoo.php">&nbsp;ZOO&nbsp;</a></li>
									<li><a href="personalCenter.php">CENTER</a></li>
									<li><a href="contact.html">CONTACT</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
								<div class="clearfix"></div>	
							<div class="clearfix"></div>
						</nav>
						<div class="clearfix"></div>
					</div>
					

                    <div class="logo">
						<h2>猫狗<span class="hlf"> 校园</span></h2>
						<h1><a href="index.html">SWEET<span class="hlf"> HOME</span></a></h1>
					</div>

				</div>
			</div>
		</div>
		<!--header-ends-->
		<!--content-->
		
		<style type = "text/css">
		html{font-size : 12px;}
		fieldset{width : 450px; margin : 0 auto;}
		legend{font-family : "微软雅黑";font-weight : bold; font-size : 14px; color : #F66}
		label{float : left; width : 70px; margin-left : 10px;font-family : "微软雅黑";}
		.left{margin-left : 270px;}
		.input{width : 150px; margin-top : 10px; margin-bottom : 10px;}
		.label{color : #F66; text-align : center; white-space : nowrap; font-size : 85%; margin-top : 15px; margin-bottom : 10px;}
		select{margin-top : 10px; margin-bottom : 10px;}
		span.error{color : #666666;font-size : 75%;}
		p{margin-bottom : 10px;}
		</style>
		<div>
			<fieldset>
			<legend>用户信息修改</legend>
			<form name = "RegForm" method = "post">

			<p>
			<label for = "username" class = "label">性别</label>
			<select name = "gender" size = "1">
				<option value = "male" <?php if($oldInfo["gender"] == "male"){echo "selected";}?>>男</option>
				<option value = "female" <?php if($oldInfo["gender"] == "female"){echo "selected";}?>>女</option>
				<option value = "na" <?php if($oldInfo["gender"] == "na"){echo "selected";}?>>秘密</option>
			</select>
			</p>

			<p>
			<label for = "email" class = "label">电子邮箱</label>
			<?php echo "<input id = \"email\" name = \"email\" type = \"text\" class = \"input\" value = \"{$oldInfo["email"]}\"/>";?>
			</p>

			<p>
			<label for = "username" class = "label">常驻区域</label>
			<?php echo "<input type = \"text\" name = \"area\" class = \"input\" value = \"{$oldInfo["area"]}\"/>";?>
			</p>
			
			<p>
			<input type = "submit" name = "submit" value = "提交修改" class = "left" />
			　　
			<input type = "button" value = "返回" onclick = "location.href='personalCenter.php'"/>
			</p>

			</form>
			</fieldset>
			</div>
		
		
		<!--content-ends-->
		<!--brand-logos-->
			<div class="brand-logo">
				<div class="container">
					<div class="col-xs-6 col-md-3 brk3">
						<a href=""><img src="./images/bd1.png" alt="" class="img-responsive"/></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<!--brand-ends-->
		<!--footer-->
			<div class="footer">
				<div class="container">
				<div class="col-md-6 mrg1">
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 brk5">
					<div class="copy-rt">
						<h4>COPYRIGHT</h4>
						<p>Based on Pet Kennel &#169 2015 Design by <a href="http://www.w3layouts.com" target="_blank">w3layouts</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
				</div>
			</div>
		<!--footer-->
		<!---->
		<script type="text/javascript">
				$(document).ready(function() {
						/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
						*/
				$().UItoTop({ easingType: 'easeOutQuart' });
		});
		</script>
		<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!----> 
	</body>
</html>
