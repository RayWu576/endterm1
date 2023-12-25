<?php
session_start();  //很重要，可以用的變數存在session裡
$userName = $_SESSION["name"];
$userID = $_SESSION["id"];
$userEmail = $_SESSION["email"];
$userPhone = $_SESSION["phoneNumber"];
$userType = $_SESSION["userType"];

$conn = require_once("config.php");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input_activity_name = $_POST["input-activity-name"];
    $start_date = $_POST["start-date"];
    $end_date = $_POST["end-date"];
    $location = $_POST["location"];
    $organizer = $_POST["organizer"];
    $capacity = $_POST["capacity"];
    $cost = $_POST["cost"];
    $register_deadline = $_POST["register-deadline"];
    $description = $_POST["description"];

    $category = $_POST["category"];

    $participants = 0;
    $year = NULL;
    $semester = NULL;
    $additional_info = NULL;
    $hours = NULL;


    if ($category == 1) {
        $year = $_POST["year"];
        $semester = $_POST["semester"];
        $additional_info = $_POST["additional-info"];
        $hours = $_POST["hours"];
    }

    $check = "SELECT * FROM user WHERE name='" . $input_activity_name . "'";
    if (mysqli_num_rows(mysqli_query($conn, $check)) == 0) {
        $sql = "INSERT INTO `activity` (
            `activity_id`, `name`, `start_date_time`, `end_date_time`, `location`, `description`, `organizer`, `capacity`, `register_deadline`, `cost`, `status`, `category`, `participants`, `year`, `semester`, `additional_info`, `hours`) 
            VALUES
            (
                NULL, 
                '$input_activity_name', 
                '$start_date', 
                '$end_date', 
                '$location', 
                '$description',
                '$organizer', 
                '$capacity', 
                '$register_deadline', 
                '$cost', 
                '',  -- Default value for 'status'
                '$category',  -- Default value for 'category'
                '$participants',  -- Default value for 'participants'
                '$year',  -- Default value for 'year'
                '$semester',  -- Default value for 'semester'
                '$additional_info',  -- Default value for 'additional_info'
                '$hours'   -- Default value for 'hours'
            )";

        if (mysqli_query($conn, $sql)) {
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3;url=index.php");
            exit;
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
    } else {
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}

mysqli_close($conn);


?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <title>嘉義大學活動/微學程報名系統</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="img/CSIE_logo.png" alt="" width="300" height="100">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="welcome.php">主頁面</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="activity.php">系上活動</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="microcredential.php">微學程</a>
                        </li>

                        <?php
                        if ($userType == 1) {
                        ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="create.php">添加活動/微學程</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <span class="navbar-text">您好， <?php echo $userName ?></span>

                    <a class="btn btn-danger" href="logout.php">登出</a>
                </div>
            </div>
        </nav>

        <div class="create-activity" id="create-activity" style="margin-top: 20%; display: block;">
            <a class="btn btn-primary" href="#" role="button" onclick="show_hide()">添加活動</a>
            <a class="btn btn-primary" href="#" role="button" onclick="show_hide()">添加課程</a>

            <form action="create.php" method="post">
                <div class="row">
                    
                    <div class="form-group col-md-3">
                        <label for="input-activity-name">活動名稱</label>
                        <input type="text" class="form-control" id="input-activity-name" placeholder="系烤" name="input-activity-name">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="organizer">主辦者</label>
                        <input type="text" class="form-control" id="organizer" placeholder="王小明" name="organizer">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="capacity">人數上限</label>
                        <input type="text" class="form-control" id="capacity" placeholder="100" name="capacity">
                    </div> 

                    
                </div> <!-- row -->
                
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="start-date">開始日期</label>
                        <input type="datetime-local" class="form-control" id="start-date" placeholder="" name="start-date">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="end-date">結束日期</label>
                        <input type="datetime-local" class="form-control" id="end-date" placeholder="" name="end-date">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="register-deadline">報名期限</label>
                        <input type="datetime-local" class="form-control" id="register-deadline" placeholder="" name="register-deadline">
                    </div>

                </div> <!-- row -->

                <div class="form-group col-md-4">
                    <label for="cost">花費</label>
                    <input type="text" class="form-control" id="cost" placeholder="新台幣 # 元" name="cost">
                </div>

                <div class="form-group">
                    <label for="location">地點</label>
                    <input type="text" class="form-control" id="location" placeholder="嘉義大學理工大樓4樓" name="location">
                </div>

                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea name="description" class="form-control" id="description" cols="20" rows="6"></textarea>
                </div>

                <input type="hidden" name="category" value="0">

                <button type="submit" class="btn btn-success">創建活動</button>
            </form>
        </div> <!-- create-activity -->

        <div class="create-course" id="create-course" style="margin-top: 20%; display: none;">
            <a class="btn btn-primary" href="#" role="button" onclick="show_hide()">添加活動</a>
            <a class="btn btn-primary" href="#" role="button" onclick="show_hide()">添加課程</a>

            <form action="create.php" method="post">
                <div class="row">

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="year">學年</label>
                            <input type="text" class="form-control" id="year" placeholder="110" name="year">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="semester">學期</label>
                            <input type="text" class="form-control" id="semester" placeholder="1" name="semester">
                        </div>
                    </div>  <!-- row -->
                    <div class="form-group col-md-4">
                        <label for="input-activity-name">課程名稱</label>
                        <input type="text" class="form-control" id="input-activity-name" placeholder="微學程課程" name="input-activity-name">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="organizer">授課教授</label>
                        <input type="text" class="form-control" id="organizer" placeholder="王小明" name="organizer">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="capacity">人數上限</label>
                        <input type="text" class="form-control" id="capacity" placeholder="100" name="capacity">
                    </div>
                </div> <!-- row -->

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="start-date">開始日期</label>
                        <input type="datetime-local" class="form-control" id="start-date" placeholder="" name="start-date">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="end-date">結束日期</label>
                        <input type="datetime-local" class="form-control" id="end-date" placeholder="" name="end-date">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="register-deadline">報名期限</label>
                        <input type="datetime-local" class="form-control" id="register-deadline" placeholder="" name="register-deadline">
                    </div>

                </div> <!-- row -->

                <div class="form-group">
                    <label for="location">地點</label>
                    <input type="text" class="form-control" id="location" placeholder="嘉義大學理工大樓4樓" name="location">
                </div>

                <div class="form-group">
                    <label for="cost">花費</label>
                    <input type="text" class="form-control" id="cost" placeholder="新台幣 # 元" name="cost">
                </div>

                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea class="form-control" id="description" cols="20" rows="6" name="description"></textarea>
                </div>                

                <div class="form-group">
                    <label for="additional-info">額外資訊</label>
                    <textarea class="form-control" id="additional-info" cols="10" rows="4" name="additional-info"></textarea>
                </div>

                <div class="form-group">
                    <label for="hours">課程時數</label>
                    <input type="text" class="form-control" id="hours" placeholder="9" name="hours">
                </div>

                <input type="hidden" name="category" value="1">

                <button type="submit" class="btn btn-success">創建課程</button>
            </form>
        </div> <!-- create-course -->

    </div> <!-- container -->

    <script src="create.js"></script>
</body>

</html>