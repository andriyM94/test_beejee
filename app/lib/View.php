<?php
namespace app\lib;

class View {

    public $nameClass;
	public $action;
	public $path;
	

    
    public function __construct($route)
    {  
		$this->path = $route;     
    }
	
	public function render($vars = []) {
		extract($vars);
        require 'app/views/'.$this->path.'.php';

	}

	public function redirect($url) {
		header("Location:".$url);
		exit;
	}
}
?>