<?php

class Router {
    public $currentRoute;

    public function __construct() {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Bu localhost/ <- Shu bo'sh joydagi yozuvni olib beradi yoki bolmasa "/" shuni oladi
    }

    public function get($route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' and $route==$this->currentRoute) {
                $callback();
                exit();
        }
    }


    public function post($route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and $route==$this->currentRoute) {
            $callback();
            exit();
        }
    }
}
