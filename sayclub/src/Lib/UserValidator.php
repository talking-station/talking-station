<?php

namespace Lib;

class UserValidator {
    public static function chkValidator(array $data) {
        $arrErrorMsg = [];
        
        // 패턴 생성

        // 아이디 : 영어 소문자 및 숫자, 6~20자
        $patternId = "/^[a-z0-9]{6,20}$/";

        // 패스워드 : 영어 대소문자 구분없이 8~20자, 특수기호(!, @, ~) 선택사항
        $patternPassword = "/^[a-zA-Z0-9!@~]{8,20}$/";

        // 이름 : 1~50자
        $patternName = "/^[가-힣]{1,20}$/u";

        // 아이디 체크
        if(array_key_exists('user_account', $data)) {
            if(preg_match($patternId, $data['user_account'], $matches) === 0) {
                // 매치된 것이 없으면 0 나옴
                $arrErrorMsg[] = '아이디는 영어 소문자 및 숫자 6~20자로 작성해주세요.';
            }
        }

        // 패스워드 체크
        if(array_key_exists('user_password', $data)) {
            if(preg_match($patternPassword, $data['user_password'], $matches) === 0) {
                $arrErrorMsg[] = '비밀번호는 대소문자 구분없이 8~20자로 작성해주세요.(!, @, ~ 허용)';
            }
        }

        // 패스워드 확인 체크
        if(array_key_exists('user_password_chk', $data)) {
            if($data['user_password'] !== $data['user_password_chk']) {
                $arrErrorMsg[] = '비밀번호와 비밀번호 확인이 일치하지 않아요.';
            }
        }

        // 이름 체크
        if(array_key_exists('user_name', $data)) {
            if(preg_match($patternName, $data['user_name'], $matches) === 0) {
                $arrErrorMsg[] = '이름은 한글만 입력해 주세요.';
            }
        }

        return $arrErrorMsg;
    }
}