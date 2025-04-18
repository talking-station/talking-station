<?php

namespace Models;

use Models\Model;
use Throwable;

class Mate extends Model {
    public function getArrMateList(array $paramArr) {
        try {
            $sql = 
                ' SELECT mates.*, users.user_nickname, users.user_profile, users.user_status '
                .' FROM mates '
                .'      JOIN users '
                .'          ON mates.related_user_id = users.user_id '
                .' WHERE '
                .'      main_user_id = :main_user_id '
                .'      AND mate_status = :mate_status '
                .'      AND mates.deleted_at IS NULL '
                .' ORDER BY '
                .'      mates.created_at DESC, mates.related_user_id ASC '
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetchAll();
        } catch(Throwable $th) {
            echo 'Mate->getMateList(), '.$th->getMessage();
            exit;
        }
    }
}