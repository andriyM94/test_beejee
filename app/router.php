<?php
namespace app;

class Router {

    protected $nameClass;
    protected $action;
    public $route;
    protected $params = [];
    public $sort_name;
    public $sort_by;

    public function __construct() {

        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if (!empty($url[3])) {
            $this->sort_name = $url[3];
        }
         if (!empty($url[4])) {
            $this->sort_by = $url[4];
        }
        if (!empty($url[1])) {
            $this->nameClass = ucfirst($url[1]);
            if (!empty($url[2])) {
                $action = explode('?',$url[2]);
                $this->action = ucfirst($action[0]);
            }
        }
    }

    function run() {
        if (!empty($this->nameClass)) {
            $path = 'app\controllers\\'.$this->nameClass.'Controller';
            if (class_exists($path)) {
                $action = $this->action.'Action';
                 if (method_exists( $path, $action)) {
                    $this->route = $this->nameClass.'/'.$this->action;
                    $controller = new $path($this->route, $this->nameClass, $this->sort_name, $this->sort_by);
                    $controller->$action();  
                } elseif (empty($this->action)) {
                    $controller = new $path($this->nameClass.'/Main',$this->nameClass,$this->sort_name, $this->sort_by);
                    $controller->MainAction();
                } else {
                     echo '404';
                }
            } else {
                echo "404";
            }
        } else {
            $path = 'app\controllers\MainController';
            $controller = new $path('Main/Main', 'Main', $this->sort_name, $this->sort_by);
            $controller->MainAction();
        }
    }
}

?>