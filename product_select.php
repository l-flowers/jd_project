<?php
	$link  = mysqli_connect("127.0.0.1","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"jd");
	$sql = "select * from jd_product";
	$result = mysqli_query($link,$sql);
	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$res = json_encode($result);
	echo $res;
?>