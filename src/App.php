<?php

require_once 'Config.php';
require_once 'Route.php';

class App{

    public function run(){
        $route = new Route();
        $route->goRoute();
    }
}