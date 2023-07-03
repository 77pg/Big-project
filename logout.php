<?php session_start();?>
<?php
session_destroy(); 
setcookie('token','',-1);
setcookie('welcome','',-1);

require('db.php');
$token = $_COOKIE['token'];
$sql = 'call logout(?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $token);
$stmt->execute();

header('location: login.php');
?>