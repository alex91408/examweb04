<?php include_once "../base.php";

$table=new DB($_GET['table']);
echo $table->count(['acc'=>$_GET['acc']]);
