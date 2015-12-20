<?php
	function getLastLineOffset(& $fp, & $offset){
		$eof = "";
		$offset--;
		$flag = 0;
		while($eof != "\n" && !fseek($fp, $offset, SEEK_END)){
			$eof = fgetc($fp);
			$offset--;
			$flag = 1;
		}
		return $flag;
	}

	function getLastNLine($filename, $a, $b){
		$result = array();
		$file = fopen($filename, "r");
		$offset = -1;
		$lastline = "";
		$i = 0;
		for(; $i < $a; ++$i){
			getLastLineOffset($file, $offset);
		}
		for(; $i < $b; ++$i){
			if(!getLastLineOffset($file, $offset))
				break;
			$lastline = fgets($file);
			array_push($result, rtrim($lastline, "\n"));
		}
		fclose($file);
		return $result;
	}

	function splitContent($userid, $filename){
		$result = array();
		$file = fopen("profile/" . $userid . "/" . $filename, "r");
		if($file == NULL){
			echo "加载失败<br>";
		}
		fgets($file);
		$line = fgets($file);
		$result["title"] = rtrim($line, "\n");

		fgets($file);fgets($file);
		$content = "";
		$line = fgets($file);
		while($line != "TIME\n"){
			$content .= "<br>" . rtrim($line, "\n");
			$line = fgets($file);
		}
		$result["content"] = $content;

		$result["time"] = date("Y-m-d h:i:sa", fgets($file));
		include("conn.php");
		$result["username"] = mysql_fetch_object(mysql_query("select username from user where uid = '$userid'"))->username;
		fclose($file);
		return $result;
	}

	function echoTemplate($post, $class){
		echo '<li class="text-ul"><span class="' . $class . '"></span><div class="folt">';
		echo '<h4>';
		echo $post["title"] . '</h4>';
		echo '<p>';
		echo $post["content"] . '</p>';
		echo '<br><p1>发布人: ' . $post["username"];
		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '发布时间: ' . $post["time"] . '</p1>';
		echo '</div><div class="clearfix"></div></li>';
	}

	function echoFloatPuppy($res){
		$pid = $res["pid"];
		$area = $res["area"];
		$coat = $res["coat"];
		$eye = $res["eye"];
		$nickname = $res["nickname"];

		$info = "常驻区域：$area<br>毛色：$coat<br>瞳色：$eye<br>";
		$imgpath = "profile/puppies/$pid/0.jpg";

		echo "	<div class=\"col-md-3 arr\">
					<div class=\"bg\">
					  <img src=\"$imgpath\" alt=\"pet\" class=\"img-responsive\">
					  <span class=\"glyphicon glyphicon-heart pst\" aria-hidden=\"true\"></span>
					  <div class=\"caption\">
						<h3>$nickname</h3>
						<p>$info </p>
						<p><a href=\"pet.php?pid=$pid\" class=\"btn btn-danger\" role=\"button\">More</a> </p>
					  </div>
					</div>
				</div>";

	}

	function unique_random($min, $max, $n){
		$cnt = 0;
		$result = array();
		while($cnt < $n){
			$result[] = mt_rand($min, $max);
			$result = array_flip(array_flip($result));
			$cnt = count($result);
		}
		shuffle($result);
		sort($result);
		return $result;
	}

?>
