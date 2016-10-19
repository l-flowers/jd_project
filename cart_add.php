<?php
	//得到cid
	$uname = $_REQUEST["uname"];
	$pid = $_REQUEST["pid"];
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
	if(!$cid){
		$sql = "INSERT INTO jd_cart VALUES (NULL,$uid)";
		mysqli_query($link,$sql);
		$cid =mysqli_insert_id($link);
	}
	echo $cid;
	//根据购物车编号和产品编号到详情表查询是否有该记录
	$sql = "SELECT * FROM jd_cart_detail where cartId=$cid AND productId = $pid";
	$result=mysqli_query($link,$sql);
	$result = mysqli_fetch_assoc($result);
	if(!$result){
		$sql = "INSERT INTO jd_cart_detail VALUES (NULL,$cid,$pid,1)";
		mysqli_query($link,$sql);
	}else{
		$sql = "select count from jd_cart_detail where cartId=$cid AND productId = $pid";
		$result =mysqli_query($link,$sql);
		$result = mysqli_fetch_assoc($result);
		$count = $result["count"];
		$count+=1;
		echo $count;
		$sql = "update jd_cart_detail set count =$count where cartId = $cid AND productId = $pid";
		mysqli_query($link,$sql);
	}
?>