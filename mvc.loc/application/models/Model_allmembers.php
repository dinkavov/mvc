<?php
namespace application\models;

use application\core\Model;
use application\core\db\DB;

class Model_User extends Model
{
    public function getAllUsers()
    {
        return (new DB())->query("
            SELECT user.id, photo, first_name, last_name, report_subject, email
            FROM user
            Left JOIN profile on profile.user_id = user.id
            ORDER BY created_at DESC 
        ");
    }

    public function getUserInfo($user_id)
    {
        return (new DB())->query("
            SELECT *, user.id
            FROM user
            Left JOIN profile on profile.user_id = user.id
            WHERE user.id =?
        ", [$user_id]);
    }
}