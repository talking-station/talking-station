<?php

namespace Controllers;

class Controller {
    
    public function __construct(string $action) {
        // 세션 시작

        // 유저 로그인 권한 체크

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
            require_once(_PATH_VIEW.'/'/$path);
        }

        
    }

    
}