<?php

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "非法使用！";
    exit();
}

// first try
/* $dsn = "mysql:host=localhost; charset=utf8; dbname=crud";
$pdo = new PDO($dsn, 'root', '');
$id = $_GET['id'];
$sql= "DELETE FROM member WHERE id = '$id'";
$pdo -> exec($sql); */

// using include and function
$id = $_GET['id'];
include "../function.php";
del('member',$id);
header("location:success.php");
?>