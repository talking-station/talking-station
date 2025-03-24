<?php
namespace Route;

class Route {
    
    public function __construct() { 
        $url = $_GET['url']; //유저가 요청한 경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // http 메소드 획득
        
        // 요청 경로 확인
        if($url === 'login') {
            if($httpMethod === 'GET') {
                
            } else if($httpMethod === 'POST') {

            }
        }
    }
}
