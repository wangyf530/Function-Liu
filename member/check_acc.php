<?php 

$dsn = "mysql:host=localhost; charset=utf8; dbname=crud";
$pdo = new PDO($dsn, 'root', '');

if(!isset($_POST['acc'])){
    header("location:login.php");
    exit();
}

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$sql = "SELECT * FROM `crud`.`member` WHERE `acc`= '$acc' && `pw` = '$pw'";
// $sql = "SELECT count(id) FROM `member` WHERE `acc`= '$acc' && `pw` = '$pw'";


echo $sql;

$row = $pdo -> query($sql) -> fetch(PDO::FETCH_ASSOC);
// $row = $pdo -> query($sql) -> fetchColumn();


echo "<pre>";
print_r($row);
echo "</pre>";


if ($acc == $row['acc'] && $pw == $row['pw']){
// if($row>=1){
    // echo "輸入正確，登入成功";
    // $_SESSION['login']=$acc;
    // echo "<br> <a href='login.php'> <br> 回首頁</a>";
    header("location:success.php");

}else{
    // echo "帳密錯誤，請重新輸入！";
    // echo '<div><a href="login.php">重新輸入</a></div>';
    header("location:login.php?err=1");
}
?>

<html>
    <body>
        <form action="./success.php" method="post">
        <div>
            <input type="hidden" name="acc" value="2345">
        </div>
        </form>
    </body>
</html>

