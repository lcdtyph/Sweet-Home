<?php
	session_start();
	$islogin = false;
	if(isset($_SESSION["userid"])){
		$islogin = true;
	}
?>
<html>
	<head>
		<title>猫狗校园 SweetHome | Home</title>
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
									<li><a class="active" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
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
					
<?php
	if(!$islogin){
        echo '<div class="loginform">
						<ul>
						<form name = "LoginForm" method = "post" action = "login.php">
							<label for = "username" class = "label">用户名：</label>
							<input id = "username" name = "username" type = "text" class = "inputstyle" />
							<label for = "password" class = "label">密  码：</label>
							<input id = "password" name = "password" type = "password" class = "inputstyle" />
							<input type = "submit" name = "submit" value = "登　录" class = "left" />
							<input type = "button" value = "注　册" onclick = "location.href=\'reg.html\'" />
						</form>
						</ul>
					</div></br>';

	}else{
		echo '<div class="loginform"><a href="personalCenter.php">
		<label class = "label" style = "font-family:consolas; font-size:120%;">' . $_SESSION["username"] . '</label></a>　　　　　　　　</div>';
	}

?>
					</br>
                    <div class="logo">
						<h2>猫狗<span class="hlf"> 校园</span></h2>
						<h1><a href="#">SWEET<span class="hlf"> HOME</span></a></h1>
					</div>
					<div class="banner-slider">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>
						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							<div class="item active">
							  <img src="./images/1.jpg" alt="dog" class="img-responsive">
							  <div class="carousel-caption ch">
								<h3>欢迎善良的人们，这里是爱心聚集地。 </h3>
								
							  </div>
							</div>
							<div class="item">
							  <img src="./images/4.jpg" alt="cat" class="img-responsive">
							  <div class="carousel-caption ch">
								<h3> 猫狗校园诚心出品，欢迎加入。</h3>
								
							  </div>
							</div>
							<div class="item">
							  <img src="./images/2.jpg" alt="wolfdog" class="img-responsive">
							  <div class="carousel-caption ch">
								<h3>每一个路边的小生命都如此美丽。 </h3>
								
							  </div>
							</div>
						  </div>
						  <!-- Controls -->
						  <a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header-ends-->
		<!--content-->
		<div class="our-products">
			<div class="container">
				<div class="products-gallery">
					<h2>OUR-FRIENDS</h2>
					
<?php
	require("dynamicfunc.php");
	include("conn.php");

	$puppies = mysql_query("select * from puppy;");
	$n = mysql_num_rows($puppies);

	$seq = unique_random(0, $n - 1, 4);
	$j = 0;
	for($i = 0; $i <= $seq[3] && $j < 4; ++$i){
		$result = mysql_fetch_assoc($puppies);
		if(!$result){
			break;
		}

		if($i == $seq[$j]){
			echoFloatPuppy($result);
			$j++;
		}
	}
//	$result = mysql_fetch_array($puppies);
//	echoFloatPuppy($result);

?>



					<div class="clearfix"></div>
				</div>


			</div>
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
