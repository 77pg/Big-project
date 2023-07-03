<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// 連結資料庫跟sql.php
$host = "localhost";
// 不建議用root，有資安危險，可以用abuser
$user = "root";
// 密碼1234
$pwd = "";
$db = "t_project";

$mysqli = new mysqli($host, $user, $pwd, $db);
?>