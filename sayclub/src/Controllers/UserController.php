<?php

namespace Controllers;
use Controllers\Controller;
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
}
