<html>
	<head>
		<title>猫狗校园 SweetHome | 爪迹</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Play-Offs Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!meta charset utf="8">
		<!--bootstrap-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<!--script-->
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<!--fonts-->

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
		<div class="banner-background">
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
									<li><a href="index.php">HOME <span class="sr-only">(current)</span></a></li>
									<li><a href="track.php" class="active">TRACK</a></li>
									
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
				</br>
					<div class="logo">
						<h3><a href="track.php" style="font-family:STHupo;font-size:35px;">爪<span class="hlf" style="font-family:STHupo;font-size:35px;"> 迹</span></a></h3>
					</div>
				</div>
			</div>
		</div>
		<!--header-->
		<!--about-->
			<div class="about-pg">
			<div class="mycontainer">
					<div class="fixer-container">
						<div class="choose-us">
							<h2 class="typ1">
								　
								<a href="loginfirst.php?redirt=publish.html">
									<span class="label label-danger" style="color : #FFF;">
									发布爪迹
									</span>
								</a>
					  		</h2>
							<h3></h3>
							<ul>

<?php

	require("dynamicfunc.php");
	
	$nPostsPerPage = 5;

	if($_GET["action"] == "page"){
		$currPage = $_GET["page"];
		$count = array("one", "two", "three", "four", "five");
		$postseq = getLastNLine("profile/allpostcount.txt", $nPostsPerPage * ($currPage - 1), $nPostsPerPage * $currPage);

		for($i = 0; $i < count($postseq); ++$i){
			$pos = strpos($postseq[$i], "/");
			$userid = substr($postseq[$i], 0, $pos);
			$filename = substr($postseq[$i], $pos + 1);
			$post = splitContent($userid, $filename);
			echoTemplate($post, $count[$i]);
		}
		
		echo '<li class="text-ul"><p>';
		if($currPage != 1){
			$prevPage = $currPage - 1;
			echo '<a href = "track.php?action=page&page=' . $prevPage . '">上一页</a>';
		}else{
			echo '　　　';
		}
		if(count($postseq) == 5){
			$nextPage = $currPage + 1;
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<a href = "track.php?action=page&page=' . $nextPage . '">下一页</a>';
		}
		echo '</p></li>';
		
	}else{
		header("refresh:0;url='track.php?action=page&page=1'");
	}

//	print_r(getLastNline("profile/allpostcount.txt", 3, 4));
?>


							</ul>
						<div class="clear"></div>
						</div>
					</div>
					
				<div class="clearfix"></div>
			</div>
		</div>   
		</div>
		<!--about-->
		<!--footer-->

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