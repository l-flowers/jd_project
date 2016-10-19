window.onload = function(){
	$("#header").load("header.php");
	$("#footer").load("footer.php");
	var html="";
	var pic="";
	var pname ="";
	var price ="";
	$.ajax({
		type:"GET",
		url:"cart_select.php",
		data:{uname:'qiangdong'},
		success:function(data){
			var res = JSON.parse(data);
			for(var i=0;i<res.length;i++){
				var pid = res[i].productId;
				console.log(pid);
				$.ajax({
					type:"GET",
					url:"getPicPname.php",
					data:{pid:pid},
					success:function(data){
						var res = JSON.parse(data);
						pic=res[0].pic;
						pname = res[0].pname;
						price = res[0].price;
						console.log(pic,pname,price);
					}
				});
				html+=`
				<tr>
                    <td>
                        <input type="checkbox">
                        <input type="hidden" value="${res[i].did}">
                        <div><img src="${pic}" alt=""></div>
                    </td>
                    <td><a href="">${pname}</a></td>
                    <td>${price}</td>
                    <td>
                        <button>-</button><input type="text" value="${res[i].count}"><button>+</button>
                    </td>
                    <td><span>${price*res[i].count}</span></td>
                    <td><a href="">删除</a></td>
                </tr>
				`;
				console.log(pic,pname,price);
			}
			$("#cart tbody").html(html);
		}
	})
}