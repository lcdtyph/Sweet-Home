<?php
	session_start();
	$islogin = false;
	if(!isset($_SESSION["userid"])){
		exit("<script>top.location = 'loginfirst.php?redirt=login.html';</script>");
	}
	include("conn.php");
	$islogin = true;
	$info = mysql_fetch_array(mysql_query("select * from user where uid = '{$_SESSION["userid"]}';"));
	$imgname = mysql_fetch_object(mysql_query("select * from profile where uid = '{$_SESSION["userid"]}';"))->photo;
	$gender = array("male"=>"男", "female"=>"女", "na"=>"秘密");
?>

<html>
<head>
<title>猫狗校园 SweetHome | PersonalCenter</title>
<link href="css/center/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
 <link href="css/center/dashboard.css" rel="stylesheet">
<link href="css/center/style.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Curriculum Vitae Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
  
<style type="text/css">
<!--

-->
</style></head>
<body>
<!-- header -->
<div class="col-sm-3 col-md-2 sidebar">
		 <div class="sidebar_top">
			 <?php

			 	echo "<h1>{$_SESSION["username"]}</h1>";
			 	echo "<span><a href='index.php'>返回主页</a></span></br>";
			 	$imgpath = "profile_photo/{$imgname}";
			 	echo "<img src=\"$imgpath\" alt=\"\"/>";
			 ?>

		 </div>
		<div class="details"> 	 
			 <h3>&nbsp;</h3>
			 <address>

			<?php
				$sex = $gender[$info["gender"]];
				echo "<span>性别：$sex</span>";
            	echo "<span>邮箱：{$info["email"]}</span>";
            	echo "<span>常驻地：{$info["area"]}</span>";
            	echo "<span>注册时间：" . date("Y-m-d", $info["regdate"]) . "</span>";
            ?>
			 </address>
			 <address>
			 	<a href = "changePw.html">更改密码</a><br>
				<a href = "upload.html">更改头像</a><br>
				<a href = "changeInfo.php">更改个人信息</a><br>
				<a href = "login.php?action=logout">注销登录</a><br>
             </address>
		</div>
		<div class="clearfix"></div>
</div>

<!---->
<link href="css/center/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!---//pop-up-box---->			
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="content">
		 <div class="details_header"><script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>
    </div>
		 <div class="company">

		 <div class="skills">
		   <h3 class="clr2" style="font-family:微软雅黑">我的小动物</h3>
		</br>
		<div class="our-products">
			<div class="container">
				<div class="products-gallery">
	
					
<?php
	require("dynamicfunc.php");
	include("conn.php");

	$puppies = mysql_query("select * from puppy where username='{$_SESSION["username"]}';");
	$n = mysql_num_rows($puppies);

	for($i = 1; $i <= $n; ++$i){
		$result = mysql_fetch_assoc($puppies);
		echoFloatPuppy($result);
		if($i % 3 == 0){
			echo '<div class="clearfix"></div></div>';
			echo '<div class="products-gallery">';
		}
	}


?>



					<div class="clearfix"></div>
				</div>


			</div>
		</div>



		 </div>

    </div>
  </div>
		 
		 <div class="copywrite">
			 <p>© 2015 Curriculum Vitae All Rights Reseverd | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
</div>
</div>
<!---->
</body>
</html>