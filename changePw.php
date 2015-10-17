
<?php
    session_start();
	header("Content-Type:text/html; charset = UTF-8");
	if(!isset($_POST["submit"])){
		exit("非法访问！");
	}
    
	include("conn.php");
	$userid = $_SESSION["userid"];
	$password = $_SESSION["password"];
	
//	echo "<script>alert(\"尚未完成\");</script>";
	
	$pWord=precondInput($_POST["password"]);
	$pWord=md5($pWord);
	
	$newpassword = precondInput($_POST["newpassword"]);
	$newrepassword = precondInput($_POST["newrepass"]);
	
    if ($pWord != $password){
	    exit('<script>alert("密码输入不正确");history.go(-1);</script>');
	}

	if($newpassword != $newrepassword){
		exit('<script>alert("两次密码不一致");history.go(-1);</script>');
	}

	if(strlen($newpassword) < 6 || strlen($newpassword) > 25){
		exit('<script>alert("密码过长或过短");history.go(-1);</script>');
	}


	function precondInput($data){
	//	return $data;
		return htmlspecialchars(stripslashes(trim($data)));
	}

	$password = md5($newpassword);

	$sqlcmd = "update user set password = '$password' where uid = '$userid'";

	if(!mysql_query($sqlcmd, $con)){
		die("error" . mysql_error());
	} else {
		exit('密码修改成功！点击<a href = "personalCenter.php">此处</a>登录');
	}

?>