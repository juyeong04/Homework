<?php

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
    <form action="" method="post"> <!-- Todo : action 어디로 보낼지 -->
        <label for="u_id">아이디</label>
        <input type="text" name="login_id" value="" id="u_id"> <!-- Todo : value값 -->
        <label for="u_pass">비밀번호</label>
        <input type="text" name="login_password" value="" id="u_pass">
        <label for="u_email">이메일</label>
        <input type="email" name="login_email" value="" id="u_email">
    </form>
    <button type="submit">회원가입</button>
</body>
</html>