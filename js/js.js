// JavaScript Document
function lof(x)
{
	location.href=x
}


function login(table){
	let chk=$("#chk").val()
	let acc=$("#acc").val()
	let pw=$("#pw").val()
	$.get("api/chk_ans.php",{chk},(res)=>{
		if(parseInt(res)==1){
			$.get("api/chk_pw.php",{acc,pw,table},(ok)=>{
				if(parseInt(ok)==1){
					switch(table){
						case 'mem':
							location.href='index.php';
						break;
						case 'admin':
							location.href='backend.php';
						break;
					}
				}else{
					alert("帳號或密碼錯誤")
				}
			})
		}else{
			alert("對不起，您輸入的驗證碼有誤請您重新登入")
		}
	})
}

function del(table,id){
	$.post("api/del.php",{table,id},()=>{
		location.reload();
	})
}