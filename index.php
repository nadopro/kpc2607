<?php
session_save_path("./sess");
session_start();

include "db.php";

$conn = connectDB();

// cmd가 없으면 init
$cmd = $_GET['cmd'] ?? "init";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPC 보안 프로그래밍 과정</title>

    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">KPC</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <!-- Menu1 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        취약점 확인
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?cmd=injection">SQL Injection</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=injection2">Secure Injection(Secure)</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=injection3">Save ID</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=injection4">Secure Save</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=brute">Brute Force</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=injection3">Save ID</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=injection3">Save ID</a></li>

                    </ul>
                </li>

                <!-- Menu2 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        회원관리
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?cmd=login">로그인</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=logout">로그아웃</a></li>
                    </ul>
                </li>

                <!-- Menu3 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        기타
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?cmd=init">메인</a></li>
                        <li><a class="dropdown-item" href="index.php?cmd=test">Test</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>

<!-- Content -->
<main class="container flex-grow-1 py-4">

<?php
include $cmd . ".php";
?>

</main>

<!-- Footer -->
<footer class="bg-light border-top py-3 mt-auto">
    <div class="container text-center">
        <strong>한국 생산성본부(KPC)</strong><br>
        정보보호책임자 : 홍길동 (help@kpc.or.kr)
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
closeDB($conn);
?>