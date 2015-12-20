<?php

	session_start();

	if(!isset($_SESSION["userid"])){
		exit('请先登录');
	}

	if(!$_POST["area"] || !$_POST["coat"] || !$_POST["eye"]){
		exit('<script>alert("必填项不能为空");history.go(-1);</script>');
	}

	$filenumber = count($_FILES["files"]["name"]);
//	echo $filenumber;
//	print_r($_FILES);

	for($i = 0; $i < $filenumber; ++$i){
		$type = $_FILES["files"]["type"][$i];
		$size = $_FILES["files"]["size"][$i];

		if(!(($type == "image/gif"
				|| $type == "image/jpeg"
				|| $type == "image/pjpeg"
				|| $type == "image/png"
				|| $type == "image/bmp"))){

			exit('<script>alert("文件不符合规定");history.go(-1);</script>');
		}
	}

	$nickname = $_POST["nickname"];
	$species = $_POST["species"];
	$area = $_POST["area"];
	$coat = $_POST["coat"];
	$eye = $_POST["eye"];
	$body = $_POST["body"];
	$otherfeature = $_POST["otherfeature"];
	$username = $_SESSION["username"];

	$puppyid = md5($_POST["species"] . $_POST["area"] 
				. $_POST["coat"] . $_POST["eye"] . $_POST["body"]
				. $_POST["otherfeature"] . time());

	include("conn.php");

	mysql_query("insert into puppy values('$species', '$area', '$coat', '$eye', '$body', '$otherfeature', '$puppyid', '$username', '$nickname');");
	$puppydir = "profile/puppies/" . $puppyid;
	mkdir($puppydir);

	$personfile = fopen("profile/{$_SESSION["userid"]}/puppy.txt", "a");
	fwrite($personfile, "$puppyid\n");
	fclose($personfile);

//	print_r($_FILES);
	for($i = 0; $i < $filenumber; ++$i){
		$filename = $_FILES["files"]["name"][$i];
		$newfilename = (string)$i . substr($filename, strpos($filename, "."));
		move_uploaded_file($_FILES["files"]["tmp_name"][$i], $puppydir . "/$newfilename");
	}

	exit('<script>alert("发布成功！");top.location="zoo.php";</script>');
/*
echo $_POST["species"] . "<br>";
echo $_POST["area"] . "<br>";
echo $_POST["coat"] . "<br>";
echo $_POST["eye"] . "<br>";
echo $_POST["body"] . "<br>";
echo $_POST["otherfeature"] . "<br>";
print_r($_FILES);
*/

?>