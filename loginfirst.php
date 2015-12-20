<?php

	session_start();
	$islogin = false;
	if(isset($_SESSION["userid"])){
		$islogin = true;
	}

	if(!$islogin){
		echo '<script>alert("请先登录");top.location="login.html";</script>';
	}else{
		header("Refresh : 0; url = {$_GET["redirt"]}");
	}

?>
