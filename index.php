<?php
session_start();

// 若之前有登入，就直接進到主頁面
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>嘉義大學活動/微學程報名系統</title>
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

<!-- container -->
<div class="container">

    <!-- main title -->
    <div class="system-name">
        <h1>嘉義大學活動/微學程報名系統</h1>
    </div> <!-- main title -->

    <!-- signin-page -->
    <div id="signin-page" class="row g-2" style="left: 50%; visibility: visible;">
        <form class="form-signin" action="login.php" method="post">
            
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingID" name="username" placeholder="">
                <label for="floatingID">學號(studentID)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="">
                <label for="floatingPassword">密碼(Password)</label>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">登入(Sign in)</button>
            <button type="button" class="btn btn-link" onclick="show_hide()">註冊(Sign up)</button>
        </form>
    </div> <!-- signin-page -->

    <!-- signup-page -->
    <div id="signup-page" class="row g-2" style="left: 70%; visibility: hidden;">
        <form class="form-signup" action="register.php" name="registerForm" method="post" onsubmit="return validateForm()">
            
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingID" name="username" placeholder="">
                <label for="floatingID">學號(studentID)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="">
                <label for="floatingPassword">密碼(Password)</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPasswordCheck" name="password_check" placeholder="">
                <label for="floatingPasswordCheck">確認密碼：(Password)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="">
                <label for="floatingName">名稱(name)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingeEail" name="mail" placeholder="">
                <label for="floatingeEail">電子信箱(Email)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingDepartment" name="department" placeholder="">
                <label for="floatingDepartment">系所(Department)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPhoneNumber" name="phone-number" placeholder="">
                <label for="floatingPhoneNumber">電話號碼(Phone)</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">註冊(Sign up)</button>
            <button type="button" class="btn btn-link" onclick="show_hide()">登入(Sign in)</button>
        </form>
    </div> <!-- signup-page -->
</div> <!-- container -->

</body>
</html>
