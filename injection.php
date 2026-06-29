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

    // 취약한 SQL (실습용)
    $sql = "SELECT * FROM users
            WHERE id='$id'
            AND pass='$pass'";

    echo "<div class='alert alert-secondary'>";
    echo "<b>실행된 SQL</b><br>";
    // echo htmlspecialchars($sql);
    echo "</div>";

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) {

        // -------------------------------
        // 세션 저장
        // -------------------------------
        $_SESSION['login'] = true;
        $_SESSION['idx']   = $row['idx'];
        $_SESSION['id']    = $row['id'];
        $_SESSION['name']  = $row['name'];
        $_SESSION['level'] = $row['level'];

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

<?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>

    <div class="alert alert-info">
        현재 로그인 상태입니다.<br>
        ID : <?php echo $_SESSION['id']; ?><br>
        이름 : <?php echo $_SESSION['name']; ?><br>
        권한 : <?php echo $_SESSION['level']; ?>
    </div>

<?php } ?>

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