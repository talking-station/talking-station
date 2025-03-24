<?php

spl_autoload_register(function($path) {
    //인스턴스 하기전에 여기 안에 함수가 먼저 실행
    
    // 1. 역슬러시를 정방향으로(Route\Route -> Route/Route)
    require_once(str_replace('\\', '/', $path).'.php');
});