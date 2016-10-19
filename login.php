<?php
	$uname = $_REQUEST["uname"];
	$upwd = $_REQUEST["upwd"];
	$link  = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"jd");
	$sql = "select * from jd_user where uname='$uname' and upwd = '$upwd'";
	$result = mysqli_query($link,$sql);
	$result = mysqli_fetch_assoc($result);
	if($result){
		echo "succ";
	}else{
		echo "err";
	}
?>