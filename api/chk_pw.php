<?php include_once "../base.php";

$table=new DB($_GET['table']);
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=$table->count(['acc'=>$acc,'pw'=>$pw]);
if($chk){
    echo $chk;
    switch($_GET['table']){
        case 'mem':
            $_SESSION['mem']=$acc;
        break;
        case 'admin':
            $_SESSION['admin']=$acc;
        break;
    }
}