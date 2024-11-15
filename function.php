<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
    <style>
        *{
            font-family:'courier new';
        }
    </style>
</head>
<body>
    <!-- <form action="reg_form.php?line=<?_GET['line']?>" method="get">
        <input type="number" name="line" id="">
        <button type="submit">提交</button>
    </form> -->
    
    <?php
    // 畫正三角形
    // function starts($line){
    
    //     for ($i=0; $i < $line; $i++) { 
    //         for ($k=0; $k < $line-1-$i; $k++) { 
    //             echo "&nbsp;";
    //         }
    //         for ($j=0; $j < (2*$i+1); $j++) { 
    //             echo "*";
    //         }
    //         echo "<br>";
    //     }
    // }

    // 畫正三角形或是菱形
    function starts($shape, $line){
        switch ($shape) {
            case '正三角形':
                for ($i=0; $i < $line; $i++) { 
                    for ($k=0; $k < $line-1-$i; $k++) { 
                        echo "&nbsp;";
                    }
                    for ($j=0; $j < (2*$i+1); $j++) { 
                        echo "*";
                    }
                    echo "<br>";
                }
            break;

            case'菱形':
                for($i=0;$i<$line;$i++){
                    if($i>floor($line/2)){
                        $k1=$i-(floor($line/2));
                        $j1=2*($i-(2*($i-(floor($line/2)))))+1;
                    }else{
                        $k1=(floor($line/2))-$i;
                        $j1=(2*$i+1);
                    }
                
                    for($k=0;$k<$k1;$k++){
                        echo "&nbsp;";
                    }
                
                    for($j=0;$j<$j1;$j++){
                        echo "*";
                    }
                    echo "<br>";
                
                }
            break;
        }
    }

    /**
     * 建立資料庫的連線變數
     * @param string $db 資料庫名稱
     * @return object
     */
    function pdo($db) {
        $dsn = "mysql:host=localhost; charset=utf8; dbname=$db";
        // 也可以再param帳號密碼
        $pdo = new PDO($dsn, 'root', '');
        return $pdo;
    }

    /* 
     * all()-給定資料表名後，會回傳整個資料表的資料
     * @param string $table 資料表名稱
     * @return array 
     */

    function all($table){
        // 連線資料庫
        $pdo = pdo('crud');
        // 去找有沒有全域 但比較浪費記憶體 可以的話不建議
        // global $pdo;
        // 判斷是否有該資料庫
        $sql = "SELECT * FROM $table";
        $rows= $pdo -> query($sql) -> fetchALL(PDO::FETCH_ASSOC);
        return $rows;

        // if(有){
        //     // 返回資料庫信息
        // } else {
        //     // 回傳錯誤信息
        // }
        // return '整個資料夾的資料';
    }

    /**
     * find()-會回傳指定資料表 的 特定id的 單筆資料
     * @param string $table 資料表名稱
     * @param integer/array $id 資料表ID
     * @return array
     */
    function find($table, $id) {
        $pdo = pdo('crud');
        if(is_array($id)){
            // 檢查帳號密碼
            $tmp = [];
            foreach ($id as $key => $value) {
                // sprintf(" `%s`='%s' ", $key, $value);
                $tmp[] = "`$key` = '$value'";
            }
            $sql = "SELECT * FROM $table WHERE ".join("&&", $tmp);
        } else {
            // 拉取指定ID的資料
            $sql = "SELECT * FROM $table WHERE `id` = $id";
        }
        $row = $pdo -> query($sql) -> fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    
    /**
     * del()-給定條件後，會去刪除指定的資料
     * @param string $table 資料表名稱
     * @param integer/array $id 條件(數字或陣列)
     * @return boolean 是否有刪除成功
     */
    function del($table, $id) {
        $pdo = pdo('crud');
        if(is_array($id)){
            // 檢查帳號密碼
            $tmp = [];
            foreach ($id as $key => $value) {
                // sprintf(" `%s`='%s' ", $key, $value);
                $tmp[] = "`$key` = '$value'";
            }
            $sql = "DELETE FROM $table WHERE ".join("&&", $tmp);
        } else {
            // 拉取指定ID的資料
            $sql = "DELETE FROM $table WHERE `id` = $id";
        }
        // 返回TRUE如果成功刪除 FALSE如果刪除失敗
        return $pdo -> exec($sql);
    }
    ?>
</body>
</html>