<?php
// Include config file
$conn = require_once "config.php";

// Define variables and initialize with empty values
$username = $_POST["username"];
$password = $_POST["password"];
//增加hash可以提高安全性
$password_hash = password_hash($password, PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM user WHERE student_id ='".$username."'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // 將data存起來 避免指針問題
        $user_data = mysqli_fetch_assoc($result);

        if ($password == $user_data["password"]) {
            session_start();
            // 將數據存儲在會話變數中
            $_SESSION["loggedin"] = true;
            //這些是之後可以用到的變數
            $_SESSION["id"] = $user_data["student_id"];
            $_SESSION["name"] = $user_data["name"];
            // 跳轉到主畫面
            header("location: welcome.php");
            exit(); // 確保在重定向之後不再執行其他代碼
        } else {
            function_alert("密碼錯誤");
        }
    } else {
        function_alert("帳號錯誤");
    }
} else{
    function_alert("Something wrong...");
}

// Close connection
mysqli_close($link);

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>";
    return false;
}
?>
