<?php

namespace Controllers;
use Controllers\Controller;
use Models\Mate;
use Models\User;

session_start();

class MateController extends Controller {   
    private $arrMateList = [];
    
    protected $userInfo = '';
    protected $user_account = '';
    
    private $main_user_id = '';
    private $totalFriends = 0;
    private $onlineFriends = 0;
    

    // getter
    public function getUserInfo() {
        return $this->userInfo;
    }

    public function getArrMateList() {
        return $this->arrMateList;
    }
    
    public function getTotalFriends() {
        return $this->totalFriends;
    }
    
    public function getOnlineFriends() {
        return $this->onlineFriends;
    }

    // setter
    public function setUserInfo($userInfo) {
        $this->userInfo = $userInfo;
    }

    public function setArrMateList($arrMateList) {
        $this->arrMateList = $arrMateList;
    }

    protected function index() {
        // 로그인한 유저 확인
        $_SESSION['user_account'] = 'test1';
        $requestData = [
            'user_account' => $_SESSION['user_account']
        ];
        
        $this->user_account = $requestData['user_account'];

        // 로그인 안 된 상태
        if (!isset($_SESSION['user_account'])) {
            header('Location: /login');
            exit;
        }

        // 유저 정보 획득
        $user = new User();
        $userInfo = $user->getUserInfo($requestData);
        $this->setUserInfo($userInfo);

        // 친구 리스트 획득
        $this->main_user_id = $userInfo['user_id'] ? $userInfo['user_id'] : '';

        $requestMateData = [
            'main_user_id' => $this->main_user_id
            ,'mate_status' => '1'
        ];

        $mate = new Mate();
        $mateList = $mate->getArrMateList($requestMateData);
        $this->setArrMateList($mateList);

        // 전체 친구 수
        $this->totalFriends = count($mateList);

        // 접속 중인 친구 수
        $onlineFriends = 0;
        foreach($mateList as $item) {
            if($item['user_status'] === '1') {
                $onlineFriends++;
            }
        }
        $this->onlineFriends = $onlineFriends;

        // var_dump($userInfo);
        // var_dump($mateList);
        // var_dump($this->totalFriends);
        // var_dump($onlineFriends);
        return 'main.php';
    }
}
