<?php
	session_start();
	$islogin = false;
	if(!isset($_SESSION["userid"])){
		$islogin = true;
	}
	if(!isset($_GET["pid"])){
		header('Refresh : 0; url = "zoo.php"');
	}

	include("conn.php");
	$info = mysql_fetch_array(mysql_query("select * from puppy where pid = '{$_GET["pid"]}';"));
	$species = array("cat"=>"喵星人", "dog"=>"汪星人", "other"=>"其它");
	$body = array("large"=>"大型", "medium"=>"正常", "small"=>"小型");
?>

<html>
<head>
<title>猫狗校园 SweetHome | Pet</title>
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

			 	echo "<h1>{$info["nickname"]}</h1>";
			 	echo "<span><a href='zoo.php'>动物园</a></span></br>";
			 	$imgpath = "profile/puppies/{$info["pid"]}/0.jpg";
			 	echo "<img src=\"$imgpath\" alt width = \"150\" height = \"150\"/>";
			 ?>

		 </div>
		<div class="details"> 	 
			 <h3>&nbsp;</h3>
			 <address>

			<?php
				$sp = $species[$info["species"]];
				$bd = $body[$info["body"]];
				echo "<span>种族：$sp</span>";
				echo "<span>毛色：{$info["coat"]}</span>";
            	echo "<span>瞳色：{$info["eye"]}</span>";
            	echo "<span>体型：$bd</span>";
            	echo "<span>常驻地：{$info["area"]}</span>";
            	echo "</br><span>其它特征：" . $info["other"] . "</span>";
            ?>
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
		   <h3 class="clr2" style="font-family:微软雅黑">生活照</h3>
		</br>
		<div class="our-products">
			<div class="container">
				<div class="products-gallery">
	
					
<?php
	require("dynamicfunc.php");
	include("conn.php");

	$imgpath = "profile/puppies/{$_GET["pid"]}/";
	for($i = 0; ; ++$i){
		$imgfile = fopen($imgpath . "$i.jpg", "r");
		if(!$imgfile){
			break;
		}
		fclose($imgfile);
		echo "<img src=\"" . $imgpath . "$i.jpg\" alt width = \"600\" height = \"450\"/>";
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
