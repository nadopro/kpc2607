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