<?php

namespace Models;

use Models\Model;
use Throwable;

class User extends Model {
    public function getUserInfo($paramArr) {
        try {
            $sql =
                ' SELECT * '
                .' FROM users '
                .' WHERE user_account = :user_account '
                .'      AND user_out_flg = \'0\' '
                ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetch();
        } catch(Throwable $th) {
            echo 'User->getUserInfo(), '.$th->getMessage();
            exit;
        }
    }
}