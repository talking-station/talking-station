<?php

namespace Models;

use Models\Model;
use Throwable;

class Mate extends Model {
    public function getArrMateList(array $paramArr) {
        try {
            $sql = 
                ' SELECT * '
                .' FROM mates '
                .' WHERE '
                .'      main_user_id = :main_user_id '
                .'      AND mate_status = :main_status '
                .'      AND deleted_at IS NULL '
                .' ORDER BY '
                .'      created_at DESC, related_user_id ASC '
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