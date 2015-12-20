<?php
	session_start();

	if(!isset($_SESSION["userid"])){
		exit("请先登录");
	}
	$userid = $_SESSION["userid"];

//	echo "temp_name      ：" . $_FILES["file"]["tmp_name"] . "<br>";
//	echo "name    ：" . $_FILES["file"]["name"] . "<br>";
	if($_GET["action"] == "profile_photo"){
		$type = $_FILES["file"]["type"];
		$size = $_FILES["file"]["size"];
		$filename = $_FILES["file"]["name"];
//		echo $type . "<br>";
//		echo $size , "<br>";

		if(!(($type == "image/gif"
				|| $type == "image/jpeg"
				|| $type == "image/pjpeg"
				|| $type == "image/png"
				|| $type == "image/bmp")
			&& $size < 500000)){
			exit("文件不符合规定");
		}

		if($_FILES["file"]["error"] > 0){
			exit("文件打开错误！ " . $_FILES["file"]["error"]);
		}

		$filename = md5(time()) . substr($filename, strpos($filename, "."));
//		echo $filename . "<br>";
		move_uploaded_file($_FILES["file"]["tmp_name"],
				"profile_photo/" . $filename);

		include("conn.php");

		$oldPhotoName = mysql_fetch_object(mysql_query("select photo from profile where uid = '$userid'"));
//		echo $oldPhotoName->photo . "<br>";
		if($oldPhotoName->photo != 'default.jpg'){
			unlink("profile_photo/" . $oldPhotoName->photo);
		}

		if(mysql_query("update profile set photo = '$filename' where uid = '$userid'")){
			echo "更改成功！<br>";
		} else {
			exit("数据库错误");
		}
		echo '<a href = "personalCenter.php">返回</a><br>';
	}else if($_GET["action"] == "animals"){

	}

?>
