<?php
/* echo "<pre>";
print_r($_POST);
echo "</pre>";
 */

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$sql="INSERT INTO `crud`.`member` (`acc`,`pw`,`email`,`tel`) VALUES ($acc, $pw, $email, $tel)";
// $sql="INSERT INTO `crud`.`member` (`acc`,`pw`,`email`,`tel`) VALUES ('{$_POST['acc']}', '{$_POST['pw']}', '{$_POST['email']}', '{$_POST['tel']}')";

$dsn = "mysql:host=localhost;charset=utf8;dbname=crud";
// 帳號root 沒有密碼
$pdo = new PDO($dsn, 'root', '');

// $pdo -> exec($sql);
// ($pdo -> exec($sql))?'新增資料成功':'新增資料失敗';
if($pdo -> exec($sql)){
    header("location:reg_form.php?status=1");
} else {
    header("location:reg_form.php?status=0");
}
?>