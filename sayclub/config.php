<?php
// 기본 경로 설정
define('_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('_PATH_VIEW', '/View'); // 뷰 경로
define('_PATH_IMG', '/View/img'); // 이미지 경로

//MariaDB 설정
define('_MARIA_DB_HOST', 'localhost');
define('_MARIA_DB_PORT', '3306');
define('_MARIA_DB_USER', 'root');
define('_MARIA_DB_PASSWORD', '2324'); // 개인 비밀번호
define('_MARIA_DB_NAME', 'talk_station'); //db 이름
define('_MARIA_DB_CHARSET', 'utf8mb4');
define('_MARIA_DB_DNS',
        'mysql:host='._MARIA_DB_HOST
        .';port='._MARIA_DB_PORT
        .';dbname='._MARIA_DB_NAME
        .';charset='._MARIA_DB_CHARSET);

