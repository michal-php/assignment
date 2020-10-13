<?php

require_once 'modules/Dns/Dns.php';

class Route
{

    public function goRoute(){
        $module = ucwords($_GET['module']);

        if (empty($_GET['module'])){
            $module = Config::DEFAULT_MODULE;
        }

        $moduleObj = new $module;

        $action = $_GET['action'].'Action';

        if (empty($_GET['action'])){
            $action =  Config::DEFAULT_ACTION;
        }

        $moduleObj->init();
        $moduleObj->$action();
        $moduleObj->finish();
    }
}