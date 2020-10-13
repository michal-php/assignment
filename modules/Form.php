<?php

require_once 'Field.php';
require_once 'fields/IntegerField.php';
require_once 'fields/StringField.php';

class Form
{
    protected $fields = [];

    var $method = 'POST';
    var $module = null;
    var $action = null;

    public function __construct($module, $action, $method='POST'){
        $this->module = $module;
        $this->action = $action;
        $this->method = $method;
    }

    public function getForm(){
        $output = "<div class=\"form-style-10\"><form method='$this->method' action='?".http_build_query(['module' => $this->module, 'action' => $this->action])."'>";

        foreach($this->fields as $name => $options){
            $output .= Field::getFieldHtml($name, $options);
        }
        $output .= '<input type="submit" value="Submit"></form></div>';
        return $output;
    }


    public function getData(){
        $data = [];

        foreach ($this->fields as $name => $field){
            $data[$name] = $_POST[$name];
        }
        return $data;
    }
}