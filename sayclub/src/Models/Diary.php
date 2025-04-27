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

    public function insertDiary(array $paramArr) {
        try {
            $sql =
                ' INSERT INTO diaries( '
                .'      user_id '
                .'      ,diary_content '
                .' ) '
                .' VALUES( '
                .'      :user_id '
                .'      ,:diary_content '
                .' ) '
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            // return $stmt->fetch();
            return $stmt->rowCount();
        } catch(Throwable $th) {
            echo 'Diary->insertDiary(), '.$th->getMessage();
            exit;
        }
    }
}