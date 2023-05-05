<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/Homework/Login/" );
define( "URL_DB", SRC_ROOT."db_common.php" );
include_once(URL_DB);

$http_method = $_SERVER["REQUEST_METHOD"];    

//&& 아이디 중복 체크 어떻게 하는거지...?
// $result = select_id($arr_post);
// $row_num = select_row_num_id($arr_post);

// if($row_num > 0)
// {
//     echo "<script> alert('이미 존재하는 아이디 입니다');</script>";
//     echo"<script>location.replace('insert_page.php');</script>";
//     exit;
// }


if($http_method === "POST")
{
    $arr_post = $_POST;
    $arr_insert = insert_info($arr_post);
    header( "Location: index.php" );   
    exit();
}


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="login_id" id="u_id" placeholder="아이디" maxlength=12 >
        <input type="text" name="login_password" id="u_pass" placeholder="비밀번호" maxlength=12>
        <input type="email" name="login_email" id="u_email" placeholder="이메일" >
        <button type="submit">회원가입</button>
    </form>
</body>
</html>