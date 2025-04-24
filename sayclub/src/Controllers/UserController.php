<?php

namespace Controllers;
use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller {

    // 어디에 쓰는지 모름
    protected $userInfo = [
        'user_account' => ''

    ];

    protected function goLogin() {
        return 'login.php';
    }

    protected function login() {
        // 유저 입력 정보 획득
        $requestData = [
            'user_account' => $_POST['user_account']
            ,'user_password' => $_POST['user_password']
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }


        // 비밀번호 암호화
        // $encryptPassword = password_hash($requestData['user_password'], PASSWORD_DEFAULT);// php 기본적인 암호화 방식
        

        // 유저정보 획득(아이디로만 확인)
        $userModel = new User();
        $prepare = [
            'user_account' => $requestData['user_account']
        ];

        $resultUserInfo = $userModel->getUserInfo($prepare);

        // 유저 존재 유무 체크
        // if(!$resultUserInfo) {
        //     $this->arrErrorMsg[] = '존재하지 않는 사용자 입니다';
        // } else if(!password_verify($requestData['user_password'], $resultUserInfo['user_password'])) {
        //     //password_verify : 패스워드 확인(유저의 패스워드 - 데이터베이스의 패스워드)            
        //     $this->arrErrorMsg[]= '패스워드가 일치하지 않습니다';
        //     return 'login.php';
        // }


        // 세션에 user_account 저장
        $_SESSION['user_account'] = $resultUserInfo['user_account'];
        

        // 로케이션 처리
        return 'Location: /main';
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

        //로그아웃
        public function logout() {        
            unset($_SESSION['user_account']); //사용자 아이디 제거
            session_destroy(); //세션 파기
            return 'Location: /login';
        }

}
