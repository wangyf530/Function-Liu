<?php
/* echo "<pre>";
print_r($_POST);
echo "</pre>";
 */

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$id = $_POST['id'];

$sql="UPDATE `crud`.`member` 
      SET `acc` = $acc,
          `pw` = $pw,
          `email` = $email,
          `tel` = $tel
      WHERE `member`.`id` = $id";

$dsn = "mysql:host=localhost;charset=utf8;dbname=crud";
// 帳號root 沒有密碼
$pdo = new PDO($dsn, 'root', '');


if($pdo -> exec($sql)){
    header("location:success.php?status=1");
} else {
    header("location:success.php?status=0");
}
?>