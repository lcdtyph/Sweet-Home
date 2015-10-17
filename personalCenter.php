<?php
	session_start();

	header("Content-Type:text/html; charset = UTF-8");

	if(!isset($_SESSION["userid"])){
		header("Location : login.html");
		exit;
	}

	include("conn.php");
	$userid = $_SESSION["userid"];
	$password = $_SESSION["password"];
	$user_query = mysql_query("select * from user where uid = '$userid' and password = '$password'");
	$row = mysql_fetch_array($user_query);
	if($row == FALSE){
		header("Location : login.html");
		exit;
	}

	echo "登录成功<br>";
	echo "用户名：  " . $row["username"] . "<br>";
//	echo "密码：    " . $row["password"] . "<br>";
//	echo "uid:      " . $userid . "<br>";
	echo "Email:    " . $row["email"] . "<br>";
	echo "注册时间：" . date("Y-m-d", $row["regdate"]) . "<br>";
	echo '<img src = "/profile_photo/' . $row["photo"] . '" alt = "头像" /><br>';
	echo '<a href = "login.php?action=logout">注销登录</a><br>';
	echo '<a href = "changePw.html">更改密码</a><br>';
	echo '<a href = "upload.html">更改头像</a><br>';

?>
