<?php
require_once('connectbooks_yi.php')
?>

<?php
    if(isset($_POST)){
        // 接收所有資料
        $mem_id = $_POST['mem_id'];
        $mem_psw = $_POST['mem_psw'];
        // 新增一筆資料
        if(isset($_POST["mem_id"])){
            $sql = "SELECT * FROM customer WHERE mem_id = '".$_POST["mem_id"]."'";
            $result = mysqli_query($dsn, $sql);
            if(mysqli_num_rows($result) > 0) {
                echo '此帳號已被註冊！';
            } else{
                $sql = "INSERT INTO customer( mem_id, mem_psw) VALUES (?,?)";
                $stmtinsert = $pdo->prepare($sql);
                $result = $stmtinsert->execute([$mem_id, $mem_psw]);
                if($result){
                    echo '註冊成功';
                }else{
                    echo '註冊失敗';
                }
            }
        }
    }
       