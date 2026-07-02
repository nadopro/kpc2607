<?php
// gps.php

$ip = $_POST['ip'] ?? '';
$jsonPretty = '';
$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ip = trim($ip);

    if ($ip == '') {
        $errorMsg = 'IP 주소를 입력하세요.';
    } else {

        $url = "http://ip-api.com/json/" . urlencode($ip);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);

        if ($response === false) {
            $errorMsg = 'cURL 오류 : ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);

            if (isset($data['status']) && $data['status'] == 'success') {
                $jsonPretty = json_encode(
                    $data,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
                );
            } else {
                $errorMsg = '조회 실패';
                $jsonPretty = json_encode(
                    $data,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
                );
            }
        }

        curl_close($ch);
    }
}
?>

<h3 class="mb-3">IP 위치 조회</h3>

<form method="post" class="row g-2 mb-3">

    <div class="col-md-10">
        <input type="text"
               name="ip"
               class="form-control"
               placeholder="예: 8.8.8.8"
               value="<?= htmlspecialchars($ip) ?>">
    </div>

    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">
            실행
        </button>
    </div>

</form>

<?php if ($errorMsg != '') { ?>
    <div class="alert alert-warning">
        <?= htmlspecialchars($errorMsg) ?>
    </div>
<?php } ?>

<?php if ($jsonPretty != '') { ?>

    <label class="form-label">JSON 결과</label>

    <textarea class="form-control"
              rows="18"
              readonly><?= htmlspecialchars($jsonPretty) ?></textarea>

<?php } ?>