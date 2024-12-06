<?php

class Router {
    public $currentRoute;

    public function __construct() {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Bu localhost/ <- Shu bo'sh joydagi yozuvni olib beradi yoki bolmasa "/" shuni oladi
    }

    public function getResource()
    {
        if (isset(explode("/", $this->currentRoute)[2])) {
            $resourceId =  explode("/", $this->currentRoute)[2];
            return $resourceId;
        }
        return false;
    }

    public function get($route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $resourceId =  $this->getResource(); // getResource dan qaytvotgan returni shunga tenglab olamiz
            $route = str_replace('{id}', $resourceId, $route);
            if($route==$this->currentRoute) {
                $callback($resourceId);
                exit();
            }
        }
    }


    public function post($route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resourceId =  $this->getResource();
            $route = str_replace('{id}', $resourceId, $route);
            if ($route==$this->currentRoute){
                $callback($resourceId);
                exit();
            }
        }
    }

    public function put($route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          if ($_POST['_method'] == 'PUT'){
              $resourceId =  $this->getResource();
              $route = str_replace('{id}', $resourceId, $route);
              if ($route==$this->currentRoute) {
                  $callback($resourceId);
                  exit();
              }
          }
        }
    }
}
