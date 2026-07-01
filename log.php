<?php
// log.php

$sub = $_GET['sub'] ?? 1;
$sub = intval($sub);

if ($sub < 1 || $sub > 2) {
    $sub = 1;
}
?>

<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link <?= ($sub == 1) ? 'active' : '' ?>"
           href="index.php?cmd=log&sub=1">
            시간별 통계
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= ($sub == 2) ? 'active' : '' ?>"
           href="index.php?cmd=log&sub=2">
            로그 목록
        </a>
    </li>
</ul>

<?php
if ($sub == 1) {
    $today = date('Y-m-d');
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['시간', '클릭수'],

        <?php
        for ($i = 0; $i <= 23; $i++) {

            $start = sprintf("%s %02d:00:00", $today, $i);
            $end   = sprintf("%s %02d:59:59", $today, $i);

            $sql = "SELECT COUNT(*) AS cnt
                    FROM log
                    WHERE time >= '$start'
                    AND time <= '$end'";

            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            $cnt = $data ? $data['cnt'] : 0;

            echo "['{$i}:00', {$cnt}],";
        }
        ?>
    ]);

    var options = {
        title: '로그 관리',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(
        document.getElementById('curve_chart')
    );

    chart.draw(data, options);
}
</script>

<div id="curve_chart" style="width:100%; height:500px;"></div>

<script>
setTimeout(function () {
    location.href = "index.php?cmd=log&sub=1";
}, 10000);
</script>

<?php
}
?>

<?php
if ($sub == 2) {

    $page = $_GET['page'] ?? 1;
    $page = intval($page);

    if ($page < 1) {
        $page = 1;
    }

    $pageSize = 50;
    $startRow = ($page - 1) * $pageSize;

    $sql = "SELECT COUNT(*) AS cnt FROM log";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $totalCount = $row['cnt'];
    $totalPage = ceil($totalCount / $pageSize);

    $sql = "SELECT *
            FROM log
            ORDER BY idx DESC
            LIMIT $startRow, $pageSize";

    $result = mysqli_query($conn, $sql);
?>

<h4 class="mb-3">최근 로그 목록</h4>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th style="width:80px;">번호</th>
            <th style="width:150px;">IP</th>
            <th style="width:150px;">ID</th>
            <th>작업</th>
            <th style="width:180px;">시간</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td class="text-center"><?= $row['idx'] ?></td>
            <td><?= htmlspecialchars($row['ip']) ?></td>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['work']) ?></td>
            <td><?= $row['time'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<nav>
    <ul class="pagination justify-content-center">

        <?php if ($page > 1) { ?>
        <li class="page-item">
            <a class="page-link"
               href="index.php?cmd=log&sub=2&page=<?= $page - 1 ?>">
                이전
            </a>
        </li>
        <?php } ?>

        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link"
               href="index.php?cmd=log&sub=2&page=<?= $i ?>">
                <?= $i ?>
            </a>
        </li>
        <?php } ?>

        <?php if ($page < $totalPage) { ?>
        <li class="page-item">
            <a class="page-link"
               href="index.php?cmd=log&sub=2&page=<?= $page + 1 ?>">
                다음
            </a>
        </li>
        <?php } ?>

    </ul>
</nav>

<?php
}
?>