<?php
session_start();  //很重要，可以用的變數存在session裡
$username = $_SESSION["name"];
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
            </ul>

            <span class="navbar-text">您好， <?php echo $username?> </span>
        </div>
    </div>
    </nav>

    <div class="card" style="width: 20rem; height:auto;">
        <div class="card-body">
            <h5 class="card-title">微學程名稱</h5>
            <p class="card-text">課程描述..................</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">時間</li>
            <li class="list-group-item">地點</li>
            <li class="list-group-item">花費</li>
            <li class="list-group-item">等等...</li>
            <li class="list-group-item">等等...</li>
            <li class="list-group-item">等等...</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">前往報名</a>
            <a href="#" class="card-link">其他...</a>
        </div>
    </div>
        </div>
    </div>

</div> <!-- container -->

</body>
</html>