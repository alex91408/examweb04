<?php

if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['mem'])){
    to("?do=login");
    exit();
}

echo "<h2 class='ct'>".$_SESSION['mem']."的購物車</h2>";

if(!isset($_SESSION['cart'])){
    
}else{


?>


<table class="all ct">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php 

    foreach($_SESSION['cart'] as $id => $qt){
        $goods=$Goods->find($id);
    ?>
    <tr class="pp" id='g<?=$goods['id'];?>'>
        <td><?=$goods['no'];?></td>
        <td><?=$goods['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$goods['qt'];?></td>
        <td><?=$goods['price'];?></td>
        <td><?=($qt*$goods['price']);?></td>
        <td>
            <img src="icon/0415.jpg" class='del' data-id="<?=$goods['id'];?>">
        </td>
    </tr>
    <?php
        }
    ?>
</table>
<div class="ct">
        <img src="icon/0411.jpg" onclick="location.href='index.php'">&nbsp;&nbsp;
        <img src="icon/0412.jpg" onclick="location.href='?do=checkout'">
    </div>

<script>

$(".del").on("click",function(){
    let id=$(this).data('id');
    $.get("api/cart.php",{id},()=>{
        $("#g"+id).remove()
    })
})

</script>

<?php
}
?>

