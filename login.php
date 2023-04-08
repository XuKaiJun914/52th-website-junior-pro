<?php
    session_start();
    if (!isset($_SESSION['error'])) $_SESSION['error'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php
        if ($_SESSION['error'] != ''){
            ?>
            <script>
                alert('<?=$_SESSION['error']?>')
            </script>
            <?php
            $_SESSION['error'] = '';
        }
    ?>
    <title>Document</title>
</head>
<body>
    <div class="top">
        <div class="navbar">
            <a href="index.php">玩家留言</a>
            <a>玩家參賽</a>
            <a class="active" href="login.php">網站管理</a>
        </div>
        <div class="banner">
            <p>Welcome to<br>Shanghai<br>Battle!</p>
            <img src="img/shanghai-og-1200x630.jpg">
        </div>
    </div>
    <div class="main">
        <div>
            <h1>網站管理-登入</h1>
            <form action="loginabc.php" method="POST">
                <label for="account">帳號</label>
                <input type="text" name="account" id="account"><br>
                <label for="password">密碼</label>
                <input type="password" name="password" id="password"><br>
                <label for="account">驗證碼</label>
                <input type="text" name="captcha" id="captcha">
                <div id="captchaNum"></div> <button type="button" onclick="rand()">驗證碼重新產生</button>
                <input type="hidden" name="captchaNum" value=""><br>
                <button type="submit">送出</button>
                <button type="reset">重設</button>
            </form>
        </div>
    </div>
<script>
    rand()
    function rand() {
        let randnum = Math.floor(Math.random() * 8999)+1000
        document.getElementById("captchaNum").innerHTML = randnum
        document.getElementsByName("captchaNum")[0].value= randnum
    }
</script>
</body>
</html>