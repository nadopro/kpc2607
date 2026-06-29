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


