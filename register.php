<?php
$conn = require_once("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];

    $name = $_POST["name"];
    $department = $_POST["department"];
    $phone_number = $_POST["phone-number"];
    $password = $_POST["password"];
    $email = $_POST["mail"];
    //檢查帳號是否重複
    $check = "SELECT * FROM user WHERE name='".$username."'";
    if(mysqli_num_rows(mysqli_query($conn, $check)) == 0){
        $sql = "INSERT INTO user (student_id , email, name, department, phone_number, user_type, password)
            VALUES('".$username."', 
            '".$email."',
            '".$name."',
            '".$department."',
            '".$phone_number."',
            0,
            '".$password."'
            )";

        if(mysqli_query($conn, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3;url=index.php");
            exit;
        } else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    } else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}

mysqli_close($conn);

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>";

    return false;
}
?>