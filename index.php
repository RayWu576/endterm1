<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>登入介面</title>
    <script src="index.js"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<!-- <h1>Log In</h1>
<h2>你可以選擇登入或是註冊帳號~</h2> -->

<div class="container">
    <div class="system-name">
        <h1>嘉義大學活動/微學程報名系統</h1>
    </div>

<!--    login-page-->
    <div id="signin-page">
        <form class="form-signin" action="login.php" method="post">

            <div class="form-floating">
                <input type="studentID" class="form-control " id="floatingID" name="username" placeholder="">
                <label for="floatingID">學號(studentID)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="">
                <label for="floatingPassword">密碼(Password)</label>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">登入(Sign in)</button>
            <button type="button" class="btn btn-link" onclick="show_hide()">註冊(Sign up)</button>
        </form>
    </div>

<!--    --><?php //print_r($_POST["submit"]) ?>
<!--    --><?php //print_r($_SERVER["REQUEST_METHOD"]) ?>

    <!-- signup-page -->
    <div id="signup-page">
        <form class="form-signup" action="register.php" name="registerForm" method="post" onsubmit="return validateForm()">
            <div class="form-floating">
                <input type="studentID" class="form-control " id="floatingID" placeholder="" name="username">
                <label for="floatingID">學號(studentID)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="">
                <label for="floatingPassword">密碼(Password)</label>
            </div>

            <div class="form-floating">
                <input type="password_check" class="form-control" id="floatingPasswordCheck" name="password_check" placeholder="">
                <label for="floatingPassword">確認密碼：(Password)</label>
            </div>


            <div class="form-floating ">
                <input type="name" class="form-control" id="floatingName" placeholder="" name="name">
                <label for="floatingeName">名稱(name)</label>
            </div>

            <div class="form-floating ">
                <input type="email" class="form-control" id="floatingeEail" placeholder="" name="mail">
                <label for="floatingeEail">電子信箱(Email)</label>
            </div>

            <div class="form-floating">
                <input type="department" class="form-control" id="floatingDepartment" placeholder="XXXX學系" name="department">
                <label for="floatingDepartment">系所(Department)</label>
            </div>

            <div class="form-floating">
                <input type="phoneNumber" class="form-control" id="floatingPhoneNumber" placeholder="" name="phone-number">
                <label for="floatingPhoneNumber">電話號碼(Phone)</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">註冊(Sign up)</button>
            <button type="button" class="btn btn-link" onclick="show_hide()">登入(Sign in)</button>
        </form>
    </div>
</div> <!-- container -->

<!--<form method="post" action="login.php">-->
<!--    帳號：-->
<!--    <input type="text" name="username"><br/><br/>-->
<!--    密碼：-->
<!--    <input type="password" name="password"><br><br>-->
<!--    <input type="submit" value="登入" name="submit"><br><br>-->
<!--    <a href="register.html">還沒有帳號？現在就註冊！</a>-->
<!--</form>-->

</body>
</html>
