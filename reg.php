
<?php
	header("Content-Type:text/html; charset = UTF-8");
	if(!isset($_POST["submit"])){
		exit("非法访问！");
	}

	$username = $email = $password = $repassword = "";

//	echo "<script>alert(\"尚未完成\");</script>";

	$username = precondInput($_POST["username"]);
	$email = precondInput($_POST["email"]);
	$password = precondInput($_POST["password"]);
	$repassword = precondInput($_POST["repass"]);
	
	if(empty($username) || empty($password) || empty($repassword)){
		exit('<script>alert("必填项不能为空");history.go(-1);</script>');
	}

	if(!preg_match("/^[\w\x80-\xff]{3,15}$/", $username)){
		exit('<script>alert("用户名不符合规定");history.go(-1);</script>');
	}

	if($password != $repassword){
		exit('<script>alert("两次密码不一致");history.go(-1);</script>');
	}

	if(strlen($password) < 6 || strlen($password) > 25){
		exit('<script>alert("密码过长或过短");history.go(-1);</script>');
	}


	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
		exit('<script>alert("E-mail格式不正确");history.go(-1);</script>');
	}

	function precondInput($data){
	//	return $data;
		return htmlspecialchars(stripslashes(trim($data)));
	}

	include("conn.php");

	$check_query = mysql_query("select * from user where username = '$username'");
	if(mysql_fetch_array($check_query)){
		echo '<script>alert("用户名已存在");history.go(-1);</script>';
		exit;
	}

	$regdate = time();
	$password = md5($password);
	$userid = md5($username . $regdate);
	$gender = $_POST["gender"];
	$area = $_POST["area"];

	$sqlcmd = "insert into user(username, password, email, regdate, uid, gender, area)values('$username', '$password', '$email', '$regdate', '$userid', '$gender', '$area')";
	mkdir("profile/" . $userid);
	$file = fopen("profile/$userid/puppy.txt", "w");
	fwrite($file, "\n");
	fclose($file);
	if(!mysql_query($sqlcmd, $con) || !mysql_query("insert into profile(uid) values('$userid');")){
		die("error" . mysql_error());
	} else {
		exit('<script>alert("用户注册成功！");top.location="login.html";</script>');
	}

?>
