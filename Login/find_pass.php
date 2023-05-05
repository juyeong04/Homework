<?php




?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
</head>
<body>
    <h1>비밀번호 찾기</h1>
    <form action="find_ck_pass.php" method="post">
        <label for="find_pass_id">아이디</label>
        <input type="text" name="login_id" id="find_pass_id" maxlength=12 required>
        <label for="find_pass_email">이메일</label>
        <input type="email" name="login_email" id="find_pass_email" required>
        <button type="submit">확인</button>
    </form> 

</body>
</html>