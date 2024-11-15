<?php

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "非法使用！";
    exit();
}

$dsn = "mysql:host=localhost; charset=utf8; dbname=crud";
$pdo = new PDO($dsn, 'root', '');
$id = $_GET['id'];
$sql= "DELETE FROM member WHERE id = '$id'";

$pdo -> exec($sql);
header("location:success.php");
?>