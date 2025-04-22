<?php

namespace Controllers;
use Controllers\Controller;
use Models\Mate;
use Models\User;
use Models\UserGroupMembership;

session_start();

class MateController extends Controller {   
    private $arrMateList = [];
    
    protected $userInfo = '';
    protected $user_account = '';
    
    private $main_user_id = '';
    private $totalFriends = 0;
    private $onlineFriends = 0;

    private $user_id = '';
    private $related_user_id = [];
    private $arrUserGroupMemberList = [];
    

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
    
    public function getArrUserGroupMemberList() {
        return $this->arrUserGroupMemberList;
    }

    // setter
    public function setUserInfo($userInfo) {
        $this->userInfo = $userInfo;
    }

    public function setArrMateList($arrMateList) {
        $this->arrMateList = $arrMateList;
    }

    public function setArrUserGroupMemberList($arrUserGroupMemberList) {
        $this->arrUserGroupMemberList = $arrUserGroupMemberList;
    }


    protected function index() {
        // 로그인한 유저 확인
        $_SESSION['user_account'] = 'test01'; // 테스트용
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
            $related_user_id[] = $item['related_user_id'];
        }
        $this->onlineFriends = $onlineFriends;
        $this->related_user_id = $related_user_id;

        // 유저 그룹별 친구 목록 획득
        $this->user_id = $userInfo['user_id'] ? $userInfo['user_id'] : '';

        $requestUserGroupData = [
            'user_id' => $this->user_id
        ];

        $userGroup = new UserGroupMembership();
        $groupList = $userGroup->getArrUserGroupMemberList($requestUserGroupData);
        $this->setArrUserGroupMemberList($groupList);

        // var_dusmp($mateList);
        // var_dump($related_user_id);
        return 'main.php';
    }
}
