<?php
namespace Route;

use Controllers\DiaryController;
use Controllers\UserController;
use Controllers\MateController;

class Route {
    
    public function __construct() { 
        //유저가 요청한 경로 획득, localhost만 주소를 쳐도 login으로 자동 연결
        $url = isset($_GET['url']) ? $_GET['url'] : ''; 
        $httpMethod = $_SERVER['REQUEST_METHOD']; // http 메소드 획득
        
        // 요청 경로 확인
        if($url === '') {
            header('Location: /login');
            exit;
        } else if($url === 'login') {
            //로그인 했을 때
            if($httpMethod === 'GET') {
                new UserController('goLogin');
            } else if($httpMethod === 'POST') {
                new UserController('login');
            }
        }
        // 로그인 후 친구 리스트
        else if($url === 'main') {
            if($httpMethod === 'GET'){
                new MateController('index');
            }
        } 
        // 회원가입
        else if($url === 'registration'){
            if($httpMethod === 'GET'){
                new UserController('goRegistration');
            } else if($httpMethod === 'POST') {
                new UserCOntroller('registration');
            }
        }
        // 다이어리
        else if($url === 'diary'){
            if($httpMethod === 'GET'){
                new DiaryController('index');
            }
        }
        // 채팅방
        else if($url === 'chat') {
            return 'chat.php';
        }
    }
}
