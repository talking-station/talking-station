<?php

namespace Models;

use Models\Model;
use Throwable;

class UserGroupMembership extends Model {
    public function getArrUserGroupMemberList(array $paramArr) {
        try {
            $sql = 
                ' SELECT user_group_memberships.*, user_groups.user_group_name '
                .' FROM user_group_memberships '
                .'      JOIN user_groups '
                .'          ON user_groups.user_group_id = user_group_memberships.user_group_id '
                .' WHERE '
                .'      user_group_memberships.user_id = :user_id '
                .'      AND user_group_memberships.membership_status = \'1\' ' 
                .'      AND user_group_memberships.deleted_at IS NULL '
                .' ORDER BY '
                .'      user_groups.created_at ASC '
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetchAll();
        } catch(Throwable $th) {
            echo 'UserGroupMembership->getArrUserGroupMemberList(), '.$th->getMessage();
            exit;
        }
    }
}