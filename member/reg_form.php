<?php
    echo (!empty($_POST['acc'])) ? print_r($_POST, true) : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <style>
        .draw{
            width: fit-content;

            margin:auto;
        }
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
                echo "註冊成功";
            } else {
                echo "註冊失敗";
            }
        }
        ?>
    </div>
    <h1>會員註冊</h1>
    <!-- form:post>(label+input:text)*4+div>input:submit+input:reset -->

    <form action="register.php" method="post">
        <div>
            <label for="acc"> 帳號 </label>：
            <input type="text" name="acc" id="acc">
        </div>
        <div>
            <label for="pw"> 密碼 </label>：
            <input type="password" name="pw" id="pw">
        </div>
        <div>
            <label for="email"> 電子郵件 </label>：
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="tel"> 電話 </label>：
            <input type="text" name="tel" id="tel">
        </div>

        <div>
            <input type="submit" value="註冊">
            <input type="reset" value="重置">
        </div>
    </form>

    <div class="draw">
        <?php
        // ../是上一層
        include("../function.php");
        // starts($_GET['line']);
        $line = isset($_GET['line'])?$_GET['line']:'7';
        starts('菱形',$line);
        
        ?>
        </div>
</body>
</html>