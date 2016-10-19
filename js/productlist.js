var loginName=null;
$(function(){
	$("#header").load("header.php");
	$("#footer").load("footer.php");
	var html="";
	$("#plist ul").html("");
	$.ajax({
		url:"product_select.php",
		type:"GET",
		success:function(data){
			var res = JSON.parse(data);
			for(var i=0;i<res.length;i++){
				html+=`<li data-pid=${res[i].pid}>
							<a href>
								<img src="${res[i].pic}" />
							</a>
							<p>${res[i].price}</p>
							<h1>
								<a href>${res[i].pname}</a>
							</h1>
							<div>
								<a href class="contrast">
									<i></i>对比
								</a>
								<a href class="p-operate">
									<i></i>关注
								</a>
								<a href class="addcart">
									<i></i>加入购物车
								</a>
							</div>
						</li>`
			}
			$("#plist ul").html(html);
		}
	})
});

$("#bt-login").click(function(){
	var str=$("#login-form").serialize();
	loginName = $("input[name='uname']").val();
	$.ajax({
		type:"POST",
		url:"login.php",
		data:str,
		success:function(data){
			if(data=="succ"){
				$(".modal").fadeOut();
				$("#top_box .rt ul li:first-child").html("欢迎回来："+loginName);
			}else{
				alert("用户名或密码错误");
			}
		}
	});
});

$("#plist").on("click",".addcart",function(e){
	e.preventDefault();
	var pid = $(this).parents("li").data("pid");
	$.ajax({
		type:"GET",
		url:"cart_add.php",
		data:{pid:pid,uname:loginName},
		success:function(){
			alert("!");
		}
	});
	
});

$("#settle_up").click(function(){

})