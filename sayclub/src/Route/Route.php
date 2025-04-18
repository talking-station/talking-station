<?php
namespace Route;
use Controllers\UserController;
use Controllers\MateController;

class Route {
    
    public function __construct() { 
        $url = $_GET['url']; //유저가 요청한 경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // http 메소드 획득
        
        // 요청 경로 확인
        if($url === 'login') {
            if($httpMethod === 'GET') {
                new UserController('goLogin'); 
            } else if($httpMethod === 'POST') {

            }
        } else if($url === 'main'){
            if($httpMethod === 'GET'){
                new MateController('index');
            }
        }
    }
}
