<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <form action="login_check.php" method="post">
        <input type="text" name="login_id" id="u_id" required placeholder="아이디"> 
        <input type="text" name="login_password"  id="u_pass" required placeholder="비밀번호"> 
        <button type="submit">로그인</button>
    </form>
    <button type="button" onclick="location.href='find_id.php'">아이디 찾기</button>
    <button type="button" onclick="location.href='find_pass.php'">비밀번호 찾기</button>

</body>
</html>