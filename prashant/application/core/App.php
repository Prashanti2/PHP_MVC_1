<?php
class App{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = 'params';

    public function __construct(){
        $url = $this -> parse_url();
        if(file_exists('../application/controllers/'.$url[0].'.php')){
            $this -> controller = $url[0];
            unset($url[0]);
        }
        require_once '../application/controllers/'.$this -> controller.'.php';
        $this -> controller = new $this -> controller;

        if(isset($url[1])){
            if(method_exists($this -> controller, $url[1])){
                $this -> method = $url[1];
                unset($url[1]);
            }
        }

        $this -> params = $url ? array_values($url) : [];

        call_user_func_array([$this -> controller, $this -> method], $this -> params);

    }

    public function parse_url(){
        if(isset($_GET['url'])){
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

?>