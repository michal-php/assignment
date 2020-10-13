<?php


interface FieldTemplate
{
    public function __construct($name, $options);
    public static function getFieldHtml($name, $options);
    public function getHtml();
}


class Field implements FieldTemplate
{
    var $label = null;
    var $value = null;
    var $options = null;
    var $name = null;

    public function __construct($name, $options){
        $this->label = $options['label'];
        unset($options['label']);

        $this->value = $options['value'];
        unset($options['value']);

        $this->name = $name;
        $this->options = $options;
    }

    public static function getFieldHtml($name, $options){
        $class_name = ucfirst($options['type']).'Field';

        $field = new $class_name($name, $options);
        return $field->getHtml();
    }

    public function getHtml(){
        $name = $this->name;

        $output = "<label for='$name'>$this->label</label><input name='$name' id='$name' type='text' ";

        if(!empty($this->value)){
            $output .= " value='$this->value'";
        }

        foreach($this->options as $option => $value){
            $output .= "$option='$value' ";
        }
        return $output.'>';
    }
}