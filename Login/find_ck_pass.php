<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/Homework/Login/" );
define( "URL_DB", SRC_ROOT."db_common.php" );
include_once(URL_DB);

$arr_post = $_POST;
$result = select_id_email($arr_post);
$result2 = select_pass($arr_post);

if($arr_post === $result)
{
    echo "<script>alert('회원님의 비밀번호는 ".$result2["login_password"]." 입니다.');</script>";
    echo "<script>location.replace('login_page.php');</script>";
    
}
else
{
    echo "<script>alert('등록 되지 않은 정보입니다');history.back();</script>";
}
?>