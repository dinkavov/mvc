<?php
namespace application\models;

use application\core\Model;
use application\core\db\DB;

class Model_Main extends Model
{
    public function getUserCount()
    {
        return (new DB())->query("SELECT COUNT(id) as total FROM user");
    }

    public function checkExistsEmail($email)
    {
        $execute_query = (new DB())->query("SELECT COUNT(id) as total FROM user WHERE email =?", [$email])[0];

        return $execute_query['total'] > 0 ? true : false;
    }

    public function saveFirstFormData($data)
    {
        $db = new DB();

        $execute_query = $db->query("
          INSERT INTO user (first_name, last_name, birthday, report_subject, country, phone, email)
          VALUES (?, ?, ?, ?, ?, ?, ?)
        ", [$data['first_name'], $data['last_name'], date('Y-m-d', strtotime($data['birthday'])), $data['report_subject'], $data['country'], $data['phone'], $data['email']]);

        if ($execute_query) {
            return $db->lastInsertId();
        }

        return false;
    }

    public function saveSecondFormData($data, $img = null)
    {
        $db = new DB();

        if (isset($_COOKIE['user_id'])) {
            $execute_query = $db->query("
              INSERT INTO profile (user_id, company, position, about_me, photo)
              VALUES (?, ?, ?, ?, ?)
            ", [$_COOKIE['user_id'], $data['company'], $data['position'], $data['about_me'], $img]);

            if ($execute_query) {
                return true;
            }

            return false;
        }
    }
}