<?php
	//通过uname获得当前用户的购物车编号
	$uname = $_REQUEST["uname"];
	$link  = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"jd");
	$sql = "select uid from jd_user where uname = '$uname'";
	$result=mysqli_query($link,$sql);
	$result = mysqli_fetch_assoc($result);
	$uid = $result["uid"];
	$sql = "select cid from jd_cart where userId = $uid";
	$result=mysqli_query($link,$sql);
	$result = mysqli_fetch_assoc($result);
	$cid = $result["cid"];
	//echo $cid;
	//通过当前
	$sql = "select * from jd_cart_detail WHERE cartId =$cid";
	$result = mysqli_query($link,$sql);
	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$res = json_encode($result);
	echo $res;
?>