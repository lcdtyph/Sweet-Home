<?php
	session_start();

	header("Content-Type:text/html; charset = UTF-8");

	if($_GET["action"] == "logout"){
		unset($_SESSION["userid"]);
		unset($_SESSION["password"]);
		echo '注销登录成功！点击<a href = "index.php">此处</a>返回';
		exit;
	}

	if(!isset($_POST["submit"])){
		exit("非法访问！");
	}

	$username = htmlspecialchars($_POST["username"]);
	$password = md5($_POST["password"]);

	include("conn.php");

	$check_query = mysql_query("select * from user where password = '$password' and username = '$username'");
	if($result = mysql_fetch_array($check_query)){
		$_SESSION["password"] = $password;
		$_SESSION["userid"] = $result["uid"];
		echo "登录成功，1s后自动跳转到个人中心";
		header("Refresh : 1; url = personalCenter.php");
		exit;
	} else {
		exit('登录失败<br>点击<a href = "login.html">此处</a>重试');
	}

?>
