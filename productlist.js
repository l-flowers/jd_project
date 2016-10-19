$(function(){
	$("#header").load("header.php");
	$("#footer").load("footer.php");
	$.ajax({
		url:"product_select.php",
		type:"GET",
		success:function(data){
			var res = JSON.parse(data);
			console.log(res);
		}
	})
});

$("#bt-login").click(function(){
	var str=$("#login-form").serialize();
	$.ajax({
		type:"POST",
		url:"login.php",
		data:str,
		success:function(data){
			if(data=="succ"){
				$(".modal").fadeOut();
			}else{
				alert("用户名或密码错误");
			}
		}
	});
});
