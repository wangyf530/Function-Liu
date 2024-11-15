<?php
    echo (!empty($_POST['acc'])) ? print_r($_POST, true) : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員編輯</title>
    <style>
        h1{
            text-align: center;
        }

        /* block - whole row */
        form{
            width: 300px;
            margin:20px auto; /* 上下 左右 */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 5px 5px grey;
        }
        /* inline - width wont work */
        form label{
            /* make label into a block so the input part will start at the same line */
            display: inline-block;
            width: 80px;
            /* 把文字撲滿 左右對齊 */
            text-align-last:justify;
        }
        
        form div{
            margin: 5px 0;
        }

        form input[type=text],
        form input[type=password],
        form input[type=number],
        form input[type=date]
        {
            /* 把字變大 */
            padding: 5px;
            /* font-size:2em; */
            border:0px;
            border-bottom: 1px solid #ccc;
        }

        form input[type=submit],
        form input[type=reset]{
            background-color: lightblue;
            padding:5px 10px;
            font-size:14px;
            border-radius:5px;
            border: 1px solid grey;
        }
        
        form input[type=submit]:hover,
        form input[type=reset]:hover{
            padding:7px 12px;

        }
        
        form input[type=reset]{
            background-color: lightpink;
        }

        form div:nth-child(5){
            text-align: center;
        }

        
    </style>
</head>
<body>
    <div class="">
        <?php
        if(isset($_GET['status'])){
            if($_GET['status'] == 1){
                echo "更新成功";
            } else {
                echo "更新失敗";
            }
        }
        ?>
    </div>
    <h1>會員資料</h1>
    <!-- form:post>(label+input:text)*4+div>input:submit+input:reset -->

    <?php
    $dsn = "mysql:host=localhost; charset=utf8; dbname=crud";
    $pdo = new PDO($dsn, 'root', '');

    $mem = $pdo -> query("SELECT * FROM `member` WHERE `id`='{$_GET['id']}'") -> fetch(PDO::FETCH_ASSOC);

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "無此帳號！";
        exit();
    }
    ?>

    <form action="edit.php" method="post">
        <div>
            <label for="acc"> 帳號 </label>：
            <input type="text" name="acc" id="acc" value="<?=$mem['acc'];?>">
        </div>
        <div>
            <label for="pw"> 密碼 </label>：
            <input type="password" name="pw" id="pw" value="<?=$mem['pw'];?>">
        </div>
        <div>
            <label for="email"> 電子郵件 </label>：
            <input type="text" name="email" id="email" value="<?=$mem['email'];?>">
        </div>
        <div>
            <label for="tel"> 電話 </label>：
            <input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>">
        </div>

        <div>
            <input type="hidden" name="id" value="<?=$mem['id'];?>">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>