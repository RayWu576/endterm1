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

    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand ml-auto" href="activity.php">
        <img src="img/CSIE_logo.png" alt="" width="400" height="150">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="creditprogram.php">微學程</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="activity.php">系上活動</a>
            </li>
        </ul>
        </div>
    </nav> -->

    <div class="row row-cols-1 row-cols-md-2 g-4 position-absolute top-50 start-50 translate-middle ">
        <div class="col">
            <div class="card" style="width: 25rem;">
                <img src="img/act1.jpg" class="card-img-top" height="200px" alt="...">
                <div class="card-body">
                    <h5 class="card-title">系上活動</h5>
                    <p class="card-text">...</p>
                    <a href="activity.php" class="btn btn-primary">查看更多</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 25rem;">
                <img src="img/act2.png" class="card-img-top" height="200px" alt="...">
                <div class="card-body">
                    <h5 class="card-title">微學程</h5>
                    <p class="card-text">...</p>
                    <a href="microcredential.php" class="btn btn-primary">查看更多</a>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->

</body>
</html>