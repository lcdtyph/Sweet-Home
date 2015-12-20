<?php
	session_start();

	header("Content-Type:text/html; charset = UTF-8");

	if($_GET["action"] == "logout"){
		unset($_SESSION["userid"]);
		unset($_SESSION["password"]);
		unset($_SESSION["username"]);
		exit('<script>top.location="index.php";</script>');
	}

	if(!isset($_POST["submit"])){
		exit('<script>alert("非法访问！");history.go(-1);</script>');
	}

	if(!$_POST["username"] || !$_POST["password"]){
		exit('<script>alert("用户名和密码不能为空");history.go(-1);</script>');
	}
	
	$username = htmlspecialchars($_POST["username"]);
	$password = md5($_POST["password"]);

	include("conn.php");

	$check_query = mysql_query("select * from user where password = '$password' and username = '$username'");
	if($result = mysql_fetch_array($check_query)){
		$_SESSION["password"] = $password;
		$_SESSION["userid"] = $result["uid"];
		$_SESSION["username"] = $username;
	//	echo "登录成功，1s后自动跳转到个人中心";
		header("Refresh : 0; url = index.php");
		exit;
	} else {
		exit('<script>alert("登录失败");top.location="zoo.php";</script>');
	}

?>
