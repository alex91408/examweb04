<?php
include_once "../base.php";
session_start();
$id=$_GET['id'];
unset($_SESSION['cart'][$id]);
?>