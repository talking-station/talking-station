<?php

namespace Models;

use Models\Model;
use Throwable;

class Diary extends Model {
    public function getDiaryList(array $paramArr) {
        try {
            $sql = 
                ' SELECT * '
                .' FROM diaries '
                .' WHERE '
                .'      user_id = :user_id '
                .'      AND deleted_at IS NULL '
                .' ORDER BY '
                .'      created_at DESC '
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetchAll();
        } catch(Throwable $th) {
            echo 'Diary->getDiaryList(), '.$th->getMessage();
        }
    }
}