<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/css/registration.css">
    <!-- flatpickr의 CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr(달력)의 CDB JS(전역으로 등록됨) -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- flatpickr 사용 코드 포함하는 js파일 -->
    <script src="/View/dist/registration.js" defer></script>
    <title>회원가입</title>
</head>
<body>
    <div class="main_container">
        <div class="head_main_container">
            <h1>회원가입</h1>
            <img src="/View/img/logo_sarangbang.png" alt="" width="300px" height="120px">
        </div>
        <div class="membership">
            <form action="/registration" method="POST">
                <?php require_once('View/inc/errorMsg.php'); ?>
                <div class="item">
                    <div class="label">아이디</div>
                    <input type="text" id="user_account" name="user_account" required autofocus>
                    <button>중복확인</button>
                </div>
                <div class="item">
                    <div class="label">비밀번호</div>
                    <input type="password" id="user_password" name="user_password" required maxlength="20" placeholder="8 ~ 20자리">
                </div>
                <div class="item">
                    <div class="label">비밀번호 확인</div>
                    <input type="password" id="user_password_chk" name="user_password_chk" required maxlength="20">
                </div>
                <div class="item">
                    <div class="label">이름</div>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div class="item">
                    <div class="label">닉네임</div>
                    <input type="text" id="user_nickname" name="user_nickname" required>
                </div>
                <div class="item">
                    <div class="label">휴대폰</div>
                    <select name="phone_num" id="user_tel1" name="user_tel1">
                        <option value="0">010</option>
                        <option value="1">019</option>
                        <option value="2">017</option>
                        <option value="3">016</option>
                        <option value="4">011</option>
                    </select>
                    <input id="user_tel2" name="user_tel2" class="num_blank" type="num" min="000" max="9999" maxlength="4">
                    <input id="user_tel3" name="user_tel3" class="num_blank" type="num" min="000" max="9999" maxlength="4">
                </div>
                <div class="item">
                    <div class="label">이메일</div>
                    <input type="text" id="user_email" name="user_email" required>@
                    <select name="email" id="email">
                        <option value="0">naver.com</option>
                        <option value="1">kakao.com</option>
                        <option value="2">hanmail.net</option>
                        <option value="3">gmail.com</option>
                        <option value="4">yahoo.com</option>
                        <option value="5">paran.com</option>
                    </select>
                </div>
                <div class="item">
                    <div class="label">생년월일</div>
                    <input type="text" id="user_birth" name="user_birth" required>
                </div>
                <div class="item">
                    <!-- null 허용용 -->
                    <div class="label">프로필 문구</div>
                </div>
                
                <div class="label">이용약관</div>
                    <textarea class="article" name="article" id="article" readonly>여러분 환영합니다. 사랑방 손님과 사랑방 선물 서비스 및 제품(이하 ‘사랑방’)을 이용해 주셔서 감사합니다. 본 약관은 다양한 사랑방 서비스의 이용과 관련하여 사랑방 서비스를 제공하는 사랑방 주식회사(이하 ‘사랑방’)와 이를 이용하는 사랑방 서비스 회원(이하 ‘회원’) 또는 비회원과의 관계를 설명하며, 아울러 여러분의 네이버 서비스 이용에 도움이 될 수 있는 유익한 정보를 포함하고 있습니다. 사랑방 서비스를 이용하시거나 사랑방 서비스 회원으로 가입하실 경우 여러분은 본 약관 및 관련 운영 정책을 확인하거나 동의하게 되므로, 잠시 시간을 내시어 주의 깊게 살펴봐 주시기 바랍니다.</textarea>
                <div class="agree">
                    <input type="radio" name= "agree" id="agree" checked>
                    <label for="agree">동의함</label>
                    <input type="radio" name= "agree" id="unagree">
                    <label for="unagree">동의안함</label>
                </div>
                <div class="footer_main_container">
                    <button type="submit">가입완료</button>
                    <a href="/View/login.php"><button type="button">취소</button></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>