<?php

namespace app\controllers;

use app\lib\db;
use app\lib\View;

class MainController {

    public $route;
    public $view;
    protected $db;
    
    public function __construct($route, $nameClass) {
        $this->route = $route;    
        $this->view = new View($this->route);
        $this->model = $this->loadModel($nameClass); 
    }
    public function MainAction ()
    {
        $this->db = new Db;
        $count = $this->model->getCount();
        $tasksLimit = $this->model->getLimitTasks();
        $vars = [
            'tasks' => $tasksLimit,
            'count' => $count[0]['COUNT(*)']
        ];
        $this->view->render($vars); 
    }

    public function LoginAction() {
        if (isset($_COOKIE['admin'])) {
             $this->view->redirect('/admin/main');
             exit;
        }
        $this->view->render(); 
        $result = $this->model->logIn();
        if (isset($_POST['submit'])) {
            if ($result) {
            setcookie("admin", 1, time()+3600, '/');
            $this->view->redirect('/admin/main');
            } else {
                echo "Введенные данные не верные";
            }
        }
    }

    public function NewtaskAction() {
        $result = $this->model->getNewTask();
        $this->view->redirect('/');
    }

     public function loadModel($name) {
        $path ='app\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }
    
}