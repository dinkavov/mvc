<?php
namespace application\controllers;

use application\core\Controller;
use application\models\Model_Main;

class Controller_Main extends Controller
{

    protected $config;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Main();
        $this->config = require __DIR__ . '/../config/main.php';
    }

    public function action_index()
    {
        $this->view->generate('main/index.php', 'layouts/main.php', [
            'total_users' => $this->model->getUserCount()[0],
            'config' => $this->config['share']
        ]);
    }

    public function action_check()
    {
        if (isset($_POST['email'])) {
            if ($this->model->checkExistsEmail($_POST['email'])) {
                echo(json_encode(false));
            } else {
                echo(json_encode(true));
            }
        }
    }

    public function action_first()
    {
        if ($_POST) {
            if ($id = $this->model->saveFirstFormData($_POST)) {
                setcookie("form", 2,time()+172800, '/');
                setcookie("user_id", $id,time()+172800, '/');

                $this->view->ajaxGenerate('main/partial/second-form.php');
            }
        }
    }

    public function action_second()
    {
        if ($_POST) {
            $target = null;

            if (isset($_FILES['photo']['name'])){
                $image_name = uniqid().'_'.$_FILES['photo']['name'];
                $target = 'img/users/'.$image_name;

                move_uploaded_file($_FILES['photo']['tmp_name'], $target);
            }

            if ($this->model->saveSecondFormData($_POST, $target)) {
                unset($_COOKIE['form']);
                setcookie("form", 3,time()+172800, '/');

                $this->view->ajaxGenerate('main/partial/third-form.php', [
                    'total_users' => $this->model->getUserCount()[0],
                    'config' => $this->config['share']
                ]);
            }
        }
    }
}