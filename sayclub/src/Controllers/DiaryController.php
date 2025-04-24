<?php

namespace Controllers;
use Controllers\Controller;
use Models\Diary;
use Models\User;

class DiaryController extends Controller {  
    private $user_id = '';
    protected $diaryList = [];


    // getter
    public function getDiaryList() {
        return $this->diaryList;
    }

    // setter
    public function setDiaryList($diaryList) {
        $this->diaryList = $diaryList;
    }

    public function index() {
        // 세션에서 user_id 획득
        $requestData = [
            'user_account' => $_SESSION['user_account']
        ];
        
        // 로그인 안 된 상태
        if (!isset($_SESSION['user_account'])) {
            header('Location: /login');
            exit;
        }

        // 유저정보 획득(아이디로만 확인)
        $userModel = new User();
        $requestUserData = [
            'user_account' => $requestData['user_account']
        ];

        $userInfo = $userModel->getUserInfo($requestUserData);
        $this->user_id = $userInfo['user_id'];

        // 다이어리 리스트
        $diary = new Diary();
        // $diaryList = $diary->getDiaryList(['user_id' => $this->user_id]); 
        $this->setDiaryList($diary->getDiaryList(['user_id' => $this->user_id]));

        // var_dump($userInfo);
        // var_dump($diaryList);

        return 'diary.php';
    }
}
