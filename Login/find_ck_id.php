<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/Homework/Login/" );
define( "URL_DB", SRC_ROOT."db_common.php" );
include_once(URL_DB);
$arr_post = $_POST;
$result = select_email($arr_post);

if($arr_post["login_email"] === $result["login_email"])
{
    echo "<script>alert('회원님의 ID는 ".$result["login_id"]." 입니다.');</script>";
    echo "<script>location.replace('login_page.php');</script>";
}
else
{
    echo "<script>alert('없는 ID입니다');history.back();</script>";
    
}

?>