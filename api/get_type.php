<?php include_once "../base.php";

$parent=$_GET['parent'];
$rows=$Type->all(['parent'=>$parent]);

foreach ($rows as $row) {
echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
