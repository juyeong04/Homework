<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/Homework/Login/" );
define( "URL_DB", SRC_ROOT."db_common.php" );
include_once(URL_DB);

session_start();
$userid = $_POST["login_id"];
$userpass = $_POST["login_password"];
$arr_post = $_POST;
$row_num = select_row_num($arr_post);

// 결과 존재하면 세션 생성
if( $row_num !== 0 )
{
    $_SESSION["userid"] = $userid;
    $_SESSION["userpass"] = $userpass;
    echo "<script>location.replace('index.php');</script>";
    exit;
}

// 결과 존재하지 않으면 로그인 실패
if( $row_num === 0 )
{
    echo "<script>alert('아이디 또는 비번이 존재하지 않습니다.');</script>";
    echo"<script>location.replace('login_page.php');</script>";
    exit;
}
?>