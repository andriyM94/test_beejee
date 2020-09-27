<?php

namespace app\controllers;
use app\lib\db;
use app\lib\View;

class AdminController {
    
    public $route;
    public $view;
    protected $db;
    
    public function __construct($route) {
        $this->route = $route;    
        $this->view = new View($this->route);
        $this->model = $this->loadModel("Main");     

    }
    public function MainAction ()
    {
        $this->db = new Db;
        $result = $this->model->getData();
        
        $vars = [
            'tasks' => $result,
        ];

        $this->view->render($vars); 
        
    }
    public function EditAction () {
        if (isset($_COOKIE['admin'])) {
            $result = $this->model->editTask();
            $this->view->redirect('/admin');
        } else {
            $this->view->redirect('/main/login');
        }

    }

     public function logOutAction() {
         setcookie("admin", "", time()-3600, '/');
           $this->view->redirect('/');
     }
    

     public function loadModel($name) {
        $path ='app\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }   
}