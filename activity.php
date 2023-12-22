<?php
$conn = require_once "config.php";

session_start();  //很重要，可以用的變數存在session裡
$userName = $_SESSION["name"];
$userID = $_SESSION["id"];
$userEmail = $_SESSION["email"];
$userPhone = $_SESSION["phoneNumber"];
$userType = $_SESSION["userType"];

$sql = "SELECT * FROM activity WHERE category = 0";
$result = $conn->query($sql);

// 關閉資料庫連線
$conn->close();

//echo "<h1 class='position-absolute top-0 start-50 translate-middle m-4'>你好 ".$username."</h1>";
echo "<a class='btn btn-danger position-absolute bottom-0 start-50 translate-middle ' href='logout.php'>登出</a>";

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <title>嘉義大學活動/微學程報名系統</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

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
                    if ($userType == 1){
                ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="create.php">添加活動/微學程</a>
                        </li>
                <?php
                    }
                ?>
            </ul>

            <span class="navbar-text">您好， <?php echo $userName?></span>

            <a class="btn btn-danger" href="logout.php">登出</a>
        </div>
    </div>
    </nav>

    <div class="row row-cols-md-2 g-6" style="margin-top:20%; width:150%; max-height:2000px"> <!-- 橫排列印所有活動卡片 -->
    <?php 
        if (mysqli_num_rows($result) > 0)
        {
            foreach ($result as $row) //開始列印
            {
                $current_id = $row['activity_id'];
    ?>
                <div clss="col">
                <div class="card" style="width: 30rem;">

                    <div class="card-header">
                        <!-- 活動名稱 -->
                        

                        <!-- 活動詳細描述展開 -->
                        <div class="accordion accordion-flush" id=<?php echo "accordionFlush".$current_id; ?> >
                            <div class="accordion-item">

                            <h2 class="accordion-header" id=<?php echo "heading".$current_id; ?>>
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                        data-bs-target=<?php echo "#collapse".$current_id; ?> aria-expanded="false" aria-controls=<?php echo "collapse".$current_id; ?>>
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                </button>
                            </h2> <!-- 欲展開的標題 -->

                            <div id=<?php echo "collapse".$current_id; ?> class="accordion-collapse collapse" 
                                    aria-labelledby=<?php echo "heading".$current_id; ?>>
                                <div class="accordion-body">
                                    <p class="card-text">
                                        <?php echo nl2br($row['description']); ?>
                                    </p>
                                </div>
                            </div> <!-- 描述 -->

                            </div> <!-- accordion-item -->
                        </div> <!-- accordion -->

                    </div> <!-- card-header -->

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">活動主辦人: <?php echo $row['organizer']; ?></li>
                        <li class="list-group-item">活動開始時間: <?php echo $row['start_date_time']; ?></li>
                        <li class="list-group-item">活動結束時間: <?php echo $row['end_date_time']; ?></li>
                        <li class="list-group-item">地點: <?php echo $row['location']; ?></li>
                        <li class="list-group-item">最大人數上限: <?php echo $row['capacity']; ?></li>
                        <li class="list-group-item">報名截止日: <?php echo $row['register_deadline']; ?></li>
                        <li class="list-group-item">繳交金額: <?php echo $row['cost']; ?></li>
                        <li class="list-group-item">狀態: <?php echo $row['status']; ?></li>
                    </ul> <!-- list-group -->

                    <div class="card-footer">
                        <a href="#" class="card-link">前往報名</a>
                        <a href="#" class="card-link">其他...</a>
                    </div> <!-- card-body -->

                </div> <!-- card整體 -->
                </div>
    <?php            
            }
        } // 列印活動cards 結束
    ?>
    </div> <!-- 橫排列印所有活動卡片 結束 -->



<!--
         <div class="card" style="width: 20rem; height:auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text">
                    <?php echo nl2br($row['description']); ?>
                </p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">活動主辦人: <?php echo $row['organizer']; ?></li>
                <li class="list-group-item">活動開始時間: <?php echo $row['start_date_time']; ?></li>
                <li class="list-group-item">活動結束時間: <?php echo $row['end_date_time']; ?></li>
                <li class="list-group-item">地點: <?php echo $row['location']; ?></li>
                <li class="list-group-item">最大人數上限: <?php echo $row['capacity']; ?></li>
                <li class="list-group-item">報名截止日: <?php echo $row['register_deadline']; ?></li>
                <li class="list-group-item">繳交金額: <?php echo $row['cost']; ?></li>
                <li class="list-group-item">狀態: <?php echo $row['status']; ?></li>
            </ul>

            <div class="card-body">
                <a href="#" class="card-link">前往報名</a>
                <a href="#" class="card-link">其他...</a>
            </div> 
        </div> -->

</div> <!-- container -->

</body>
</html>