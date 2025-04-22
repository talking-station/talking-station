<?php

namespace Controllers;

use Lib\Auth;

class Controller {
    protected $arrErrorMsg = []; //화면에 표시할 에러 메세지를 저장하는 프로퍼티



    public function __construct(string $action) {
        // 세션 시작
        if(session_status() === PHP_SESSION_NONE) {
            //세션 실행 안됨 = 1 , 세션 실행 중일 경우 = 2

            // 실행이 안되었을 경우 세션을 시작함
            session_start();
        }

        // 유저 로그인 권한 체크
        Auth::chkAuthorization();
        
        // 해당 action 호출
        $resultAction = $this->$action();
        
        // view 호출
        $this->callView($resultAction);

        exit;
    }

    // 뷰 또는 로케이션 처리용 메소드
    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);
        } else {
            require_once(_PATH_VIEW.'/'.$path); // 250411 이경진 /$path -> .$path 수정
        }
    }
}