<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=52;charset=utf8;","admin","1234");
$p = $_POST;
$error = "";
if ($p['captchaNum'] != $p['captcha']) $error = "驗證碼驗證錯誤";
if ($p['account'] == "" || $p['password'] == "" || $p['captcha'] == "") $error = "值不能為空";

if ($error == ''){
    $result = $conn->query("SELECT * FROM admin WHERE username = '{$p['account']}' AND password = '{$p['password']}'");
    if ($result->rowCount() == 0){
        $error = "帳號密碼錯誤";
    } else {
        $row = $result->fetch();
        $_SESSION['userid'] = $row['id']; 
        $error = "登入成功";
    }
}

if($error != ''){
    $_SESSION['error'] = $error;
    header("Location:login.php");
}