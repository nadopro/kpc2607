1. 환경 설치

	download xampp
	download visual code

2. xampp control panel
	Apache,  MySQL  실행

	localhost

	http://localhost/phpmyadmin/

	새로운 -> 사용자계정 -> 사용자 추가

	id/db : secure
		pass : 1111

		v : 동명의 데이터베이스 ..
		v : Grant all priv ... 
		v : 모두 체크


    [abc]

    ls *.[ch]

    [abc]{2}

    ab, cc, cb, bd(x)

    [abc]{2,4}  2~4ghl

    ac, ccc

    [abcdefg....xyz]{4,10}

    [a-zA-Z0-9]{4,6}

    test, tester, secure


    010-[0-9]{4}-[0-9]{4}


    ^[가-힣]{2,4}$

    https://github.com/nadopro/kpc2607

    https://www.security.org/how-secure-is-my-password/

    https://w3schools.com


1. 무차별 대입 공격(Brute Force Attack)

  로그인 및 정보 저장 방법

  session vs. cookie vs. localStorage

  javascript:alert(document.cookie)

  a. session 관리 주체 = 서버
  b. cookie 관리 주체 = client
  c. localStorage 관리 주체 = client


2. SQL Injection

    $id : test
    pass : 1111

    $sql = 
    "select * from users where id='$id' and pass='$pass' ";

      select * from users where id='xxx' or 2>1 -- ' and pass='$pass' 


      id = xxx' or 2>1 limit 2, 1 -- 
      pass = dsafdsa


Q1.

다음 조건을 만족하는 index.php 파일을 만들어 줘.
HTML5와 Bootstrap5를 이용해서 반응형 홈페이지를 만들거야.
상단에는 Navbar를 이용해서 메뉴를 구성할거야.
메뉴에는 menu1, menu2, menu3이 있어.
각각의 메뉴는 Dropdown 으로 구성할거야.
menu1에는 menu1-1, menu1-2, menu1-3,
menu2에는 menu2-1, menu2-2,
menu3에는 menu3-1, menu3-2 로 구성되어 있어.

내용에는 "KPC 보안 프로그래밍 과정"이라고만 써줘.
하단에는 사이트 정보가 있는데,
"한국 생산성본부(KPC)
정보보호책임자: 홍길동(help@kpc.or.kr")

만약에 내용이 너무 적더라도 하단의 사이트 정보는 항상 화면의
맨 아래에 배치되도록 구성해 줘.


2. MySQL을 사용해서 users 테이블 스키마를 만들고 싶어.

  idx auto_increment primary key,
  id varchar(20) unique,
  name varchar(30),
  pass varchar(50),
  level int(3) default '1'


CREATE TABLE users (
    idx INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(30) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    level INT(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, pass, level)
VALUES ('admin', '관리자', '1234', 9);

INSERT INTO users (id, name, pass, level)
VALUES ('test', '테스트', '1234', 1);

INSERT INTO users (id, name, pass, level)
VALUES ('test', '테스트', '1234', 1);


Q2. db.php을 하나 만들고 싶어.

$conn = connectDB();
함수를 만들고 싶어.

dbName : secure
dbUser : secure
dbPass : 1111

mysqli()를 이용해서 함수화 하고 싶어.

closeDB($conn)도 같이 만들어 줘.




connectDB();

for(;;)
{
  insert into ...()
}

closeDB()




for(;;)
{
  connectDB();
  insert into ...()
  closeDB()  
}

GET/POST의 차이

GET : 주소창에 파라미터를 전달
  예) test.php?name=test&pass=1234&age=10
  https://newsstand.naver.com/?list&pcode=117

POST : Request Body 속에 파라미터를 전달


javascript:alert(document.cookie)


Q3. 현재 index.php 파일이 다음과 같이 되어 있어.
이때 index.php?cmd=test와 같이 GET 방식으로 cmd값을 찾으려고 해.
즉, cmd = $_GET['cmd']; 와 같이 처리할 거야.
만약에 cmd가 없으면 init를 default로 해 줘.
바디 부분은 include "$cmd.php"; 와 같이 처리할 거야.
예를 들어서
index.php?cmd=login 으로 되어 있으면
body에서 include "login.php"; 와 같이 처리하고 싶어.


<?php
    session_save_path("./sess");
    session_start();
    
    include "db.php";

    $conn = connectDB();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KPC 보안 프로그래밍 과정</title>

  <!-- Bootstrap5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">KPC</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              취약점 확인
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">SQL Injection</a></li>
              <li><a class="dropdown-item" href="#">SQL Injection(Secure)</a></li>
              <li><a class="dropdown-item" href="#">menu1-3</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              menu2
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">menu2-1</a></li>
              <li><a class="dropdown-item" href="#">menu2-2</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              menu3
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">menu3-1</a></li>
              <li><a class="dropdown-item" href="#">menu3-2</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <main class="container flex-grow-1 d-flex align-items-center justify-content-center">
    <h1>KPC 보안 프로그래밍 과정</h1>
  </main>

  <!-- Footer -->
  <footer class="bg-light border-top py-3 mt-auto">
    <div class="container text-center">
      한국 생산성본부(KPC)<br>
      정보보호책임자: 홍길동(help@kpc.or.kr)
    </div>
  </footer>

  <!-- Bootstrap5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

Q4.

이와 같이 index.php을 모두 거치도록 구조가 결정되었어.
index.php?cmd=injection을 링크로 만들었어.
즉 injection.php을 include하면 되는 상황이야.
이 파일은 sql injection을 연습해보고 싶어.
로그인 창을 만들고, id, pass를 입력받아.
CREATE TABLE users (
    idx INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(30) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    level INT(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


이 테이블에 암호화하지 말고, 단순하게 id, pass검사하는 코드를 만들어줘.

index.php에서 이미 DB연결은 끝나고 $conn로 사용이 가능해.

mysqli_query()와 mysqli_fetch_array()를 이용해 줘.


Q5.

현재 코드가 다음과 같은데, 여기에 세션처리까지 해서,
로그인 기록을 남겨줘.

<?php
// injection.php
?>

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card">
            <div class="card-header bg-danger text-white">
                SQL Injection 실습 (취약한 로그인)
            </div>

            <div class="card-body">

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id   = $_POST['id'];
    $pass = $_POST['pass'];

    // -------------------------------
    // 취약한 SQL (실습용)
    // -------------------------------
    $sql = "SELECT * FROM users
            WHERE id='$id'
            AND pass='$pass'";

    echo "<div class='alert alert-secondary'>";
    echo "<b>실행된 SQL</b><br>";
    //echo htmlspecialchars($sql);
    echo "</div>";

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) {

        echo "<div class='alert alert-success'>";
        echo "로그인 성공<br>";
        echo "이름 : {$row['name']}<br>";
        echo "권한 : {$row['level']}";
        echo "</div>";

    } else {

        echo "<div class='alert alert-danger'>";
        echo "로그인 실패";
        echo "</div>";

    }

}

?>

<form method="post">

    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text"
               name="id"
               class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password"
               name="pass"
               class="form-control">
    </div>

    <button class="btn btn-danger">
        Login
    </button>

</form>

            </div>
        </div>

    </div>
</div>


Q6. 현재 로그인 창 아래에 로그인 버튼만 있는데,

로그인된 경우에는 "로그아웃" index.php?cmd=logout
로그인이 안된 경우는 지금처럼 동작하면 돼.