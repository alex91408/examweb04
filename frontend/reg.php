<h1 class="ct">編輯會員資料</h1>
<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkAcc('mem')">檢測帳號</button>
    </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址 </td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><button onclick="reg()">註冊</button><button onclick="resetForm()">重置</button></div>
<script>
function chkAcc(table){
    let acc=$("#acc").val();
    $.get("api/chk_acc.php",{acc,table},(res)=>{
        if(parseInt(res)==1 || acc=='admin'){
            alert("帳號已被使用")
        }else{
            alert("此帳號可使用")
        }
    })
}


function reg(){
	let acc=$("#acc").val()
	let pw=$("#pw").val()
	let name=$("#name").val()
	let addr=$("#addr").val()
	let email=$("#email").val()
	let tel=$("#tel").val()
	let table='mem';
    $.get("api/chk_acc.php",{acc,table},(res)=>{
        if(parseInt(res)==1 || acc=='admin'){
            alert("帳號已被使用")
        }else{
            $.get('api/reg.php',{acc,pw,name,addr,email,tel},()=>{
				location.href='?do=login'
			})
        }
    })
}

function resetForm(){
	$("input[type='text'],input[type='password']").val('')
}
</script>