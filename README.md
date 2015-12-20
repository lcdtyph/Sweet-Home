# Sweet-Home
猫狗校园

后台部分：
	用户登录、注册：login.php reg.php
	更改密码：      changePw.php
	头像上传：      upload.php
	爪迹发布：      publish.php
	小动物发布：    puppy.php
	数据库交互：    conn.php
公共函数：      dynamicfunc.php loginfirst.php
修改信息：      changeInfo.php

前端部分：
	用户登录、注册：login.html reg.html
更改密码：      changePw.html
	头像上传：      upload.html
	爪迹发布：      publish.html
	小动物发布：    puppy.html
以上网页中表单信息提交至前述同名php文件中处理，所有密码字段以md5散列后的值传递和储存。
	主页：          index.php
爪迹：          track.php
动物园：        zoo.php
用户信息：      personalCenter.php
小动物信息：    pet.php
由于平面设计能力欠缺，前端部分我们采用了修改模板并内嵌php的方式，模板版权信息已保留在页面，下载地址为http://www.w3layouts.com
与数据库的交互：
Database： sweethome
Table:     
+---------------------+
| Tables_in_sweethome |
+---------------------+
| profile             |
| puppy               |
| user                |
+---------------------+
	profile:
	+-----------+-------------+------+-----+-------------+-------+
| Field     | Type        | Null | Key | Default     | Extra |
+-----------+-------------+------+-----+-------------+-------+
| uid       | varchar(40) | NO   |     | NULL        |       |
| postcount | int(10)     | YES  |     | 0           |       |
| photo     | varchar(40) | YES  |     | default.jpg |       |
+-----------+-------------+------+-----+-------------+-------+

	puppy:
+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| species  | varchar(16)  | YES  |     | NULL    |       |
| area     | varchar(64)  | YES  |     | NULL    |       |
| coat     | varchar(64)  | YES  |     | NULL    |       |
| eye      | varchar(64)  | YES  |     | NULL    |       |
| body     | varchar(16)  | YES  |     | NULL    |       |
| other    | varchar(256) | YES  |     | NULL    |       |
| pid      | char(32)     | YES  |     | NULL    |       |
| username | varchar(15)  | YES  |     | NULL    |       |
| nickname | varchar(40)  | YES  |     | NULL    |       |
+----------+--------------+------+-----+---------+-------+

user:
+----------+-------------+------+-----+-------------+-------+
| Field    | Type        | Null | Key | Default     | Extra |
+----------+-------------+------+-----+-------------+-------+
| username | varchar(15) | YES  |     | NULL        |       |
| password | varchar(40) | YES  |     | NULL        |       |
| email    | varchar(50) | YES  |     | NULL        |       |
| regdate  | int(11)     | YES  |     | NULL        |       |
| uid      | varchar(40) | YES  |     | NULL        |       |
| gender   | varchar(8)  | YES  |     | NULL        |       |
| area     | varchar(64) | YES  |     | NULL        |       |
+----------+-------------+------+-----+-------------+-------+
本网站部署时，需要事先在mysql中新建上述database和table，并在conn.php中修改本地mysql服务器的用户名密码。

profile目录功能：
	profile/allpostcount.txt     存储所有用户发布的帖子，每一行为一个帖子的目录
	profile/{$userid}/puppy.txt  存储uid为$userid的用户发布的小动物，每一行为小动物的pid
	profile/{$userid}/[0-...].txt 存储uid为$userid的用户发布的爪迹，文件名为爪迹序号，从0开始
	profile/puppies/{$pid}/*.jpg  存储pid为$pid的小动物的生活照，目前不支持其他格式
profile_photo/*               存储所有用户的头像，数据库中profile表的photo字段存储了该用户的头像图片名称，默认为default.jpg


由于大家做网页的基础普遍较弱，因此分工采用分散的模式，即每个人都会有前端和后台的任务，并没有明显的模块化，所以文件布置较乱。
