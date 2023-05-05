<?php
session_start();
$userid = isset($_SESSION["userid"])? $_SESSION["userid"] : "";

// && 무슨 에러 터지는거지..????
// if(!isset($_SESSION["userid"]))
// {
//     echo "<script>location.replace('index.php');</script>";
// }
// else 
// {
//     $userid = $_SESSION["userid"];
// }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexPage</title>
</head>
<body>
    <?php
    // 로그인 전
    if(!$userid)
    {
    ?>
        <a href="login_page.php">로그인</a>
        <a href="insert_page.php">회원가입</a>
    <?php
    }
    else {
    ?>
        <h2><?php echo "안녕하세요 $userid 님";?></h2>
        <button type="button" onclick="location.href='logout.php'">로그아웃</button>
    <?php
    }
    ?>
</body>
</html>