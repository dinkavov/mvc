<?php
namespace application\controllers;

use application\core\Controller;

class Controller_404 extends Controller
{
    public function action_index()
    {
        $this->view->generate('404.php', 'layouts/main.php');
    }
}