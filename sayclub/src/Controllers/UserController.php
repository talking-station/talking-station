<?php

namespace Controllers;
use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller {   
    protected $userInfo = '';
    protected $user_account = '';

    protected function goLogin() {
        return 'login.php';
    }

    // getter
    public function getUserInfo() {
        return $this->userInfo;
    }

    // setter
    public function setUserInfo($userInfo) {
        $this->userInfo = $userInfo;
    }

    protected function userInfo() {
        $requestData = [
            'user_account' => 'aaaaa'
        ];

        $this->user_account = $requestData['user_account'];
    
        // 유저 정보 획득
        $userInfo = new User();
        $this->setUserInfo($userInfo->getUserInfo($requestData));


        return 'main.php';
    }

    // 회원 가입 페이지 이동
    public function goRegistration() {
        return 'registration.php';
    }

    // 회원 가입 처리
    public function registration() {
        $requestData = [
            'user_account' => isset($_POST['user_account']) ? $_POST['user_account'] : '',
            'user_password' => isset($_POST['user_password']) ? $_POST['user_password'] : '',
            'user_password_chk' => isset($_POST['user_password_chk']) ? $_POST['user_password_chk'] : '',
            'user_name' => isset($_POST['user_name']) ? $_POST['user_name'] : '',
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'registration.php';
        }
        return 'Location: /login';
    }
}
