<?php
	session_start();
	header("Content-Type:text/html; charset = UTF-8");
	if(!isset($_POST["submit"]) || !isset($_SESSION["userid"])){
		exit('<script>alert("请先登录！");top.location="login.html";</script>');
	}
	$userid = $_SESSION["userid"];

	include("conn.php");

	$postcount = mysql_fetch_object(mysql_query("select postcount from profile where uid = '$userid'"))->postcount;

	$file = fopen("profile/" . $userid . "/" . $postcount . ".txt", "w");
	fwrite($file, "TITLE\n" . $_POST["PostTitle"]);
	fwrite($file, "\n\nCONTENT\n" . $_POST["PostContent"]);
	fwrite($file, "\n\nTIME\n" . time());
	fclose($file);

	$file = fopen("profile/allpostcount.txt", "a");
	fwrite($file, $userid . "/" . $postcount . ".txt\n");
	fclose($file);
	
	mysql_query("update profile set postcount = $postcount+1 where uid = '$userid';");

	exit('<script>alert("爪迹发布成功！");top.location="track.php";</script>');
?>
