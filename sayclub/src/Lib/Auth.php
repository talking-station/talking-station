<?php

//인증과 인가에 대한 처리 담당
namespace Lib;
class Auth {
    
    
    public static function chkAuthorization () {
        // //비로그인시 접속 불가능한 리스트
        // $arrNeedAuth = [
        //     'main' // 친구 목록
        //     ,'registration' // 회원가입
        //     ,'logout'
        //     ,'diary'
        // ];
        // $url = $_GET['url'];

        // //접속 권한이 없는 페이지 접속 차단(로그인 페이지로 이동)
        // if(!isset($_SESSION['user_account']) && in_array($url, $arrNeedAuth)) {
        //     header('Location: /login'); //로그인이 안되어 있을때 로그인창으로 이동
        //     exit;
        // }

        // if(isset($_SESSION['user_account']) && !in_array($url, $arrNeedAuth)) {
        //     header('Location: /main');
        //     exit;
        // }
    }
}