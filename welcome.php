<?php session_start();?>
<?php

if (!$_COOKIE['token']) {
    header('location: login.php');
    die();
}
require('db.php');
$token = $_COOKIE['token'];
$sql = 'select * from userinfo where token = ?';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $token);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$cname=$row['cname'];
$image=$row['photo'];
if($image == null){
    $image = file_get_contents(("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1zbW2LsUxp_IT0_O9-khcIY-6_BnL_pp_Wg&usqp=CAU"));
}
$mime_type=(new finfo(FILEINFO_MIME_TYPE))->buffer($image);
$image_base64=base64_encode($image);
$src="data:{$mime_type};base64,{$image_base64}"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div><button onclick="location.href='logout.php'">登出</button></div>
    <div><button onclick="location.href='revise.php'">修改</button></div>
    <h1><?= $cname ?>成功登入</h1>
    <img src="<?= $src ?>" width="200">
</body>

</html>