<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/css/login.css">
    <title>로그인</title>
</head>
<body>
    <div class="main_container">
        <div class="head_main_container">
            <!-- <h2>사랑방 손님과 사랑방 선물</h2> -->
            <img src="/View/img/logo_sarangbang.png" alt="logo" width="500px" title="sarangbang">
        </div>
        <div class="main_container_login">
            <form action="">
                <div class="login">
                    <label for="id">* 아이디</label>
                    <input type="text" name="id" autofocus required placeholder="아이디">
                    <button type="submit">로그인</button>
                    <label for="password">* 비밀번호</label>
                    <input type="password" name="password" required placeholder="***">
                </div>
                <hr>
                <div class="main_container_login_save">
                    <input type="checkbox" name="save" id="id_save" checked>
                    <label for="id_save">아이디 저장</label>
                    <input type="checkbox" name="save" id="pw_save">
                    <label for="pw_save">비밀번호 저장</label>
                </div>
            </form>
            <div class="membership">
                <a href="/View/membership.php"><p>아직 회원이 아니신가요?</p></a>
                <a href=""><p>아이디와 비밀번호를 잊으셨나요?</p></a>
            </div>
            </div>
            
        </div>
    </div>
</body>
</html>