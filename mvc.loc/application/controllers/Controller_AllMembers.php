<?php
namespace application\controllers;

use application\core\Controller;
use application\models\Model_User;

class Controller_AllMembers extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_User();
    }

    public function action_index()
    {
        $this->view->generate('all-members/index.php', 'layouts/main.php', [
            'users' => $this->model->getAllUsers()
        ]);
    }

    public function action_view()
    {
        if (isset($_POST['user_id'])) {
            $this->view->ajaxGenerate('all-members/user-info.php', [
                'user_info' => $this->model->getUserInfo($_POST['user_id'])[0]
            ]);
        }
    }
}