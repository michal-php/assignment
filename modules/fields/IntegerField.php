<?php

class IntegerField extends Field
{

    public function getHtml(){
        $name = $this->name;

        $output = "<label for='$name'>$this->label</label><input name='$name' id='$name' type='number' ";

        if(!empty($this->value)){
            $output .= " value='$this->value'";
        }

        foreach($this->options as $option => $value){
            $output .= "$option='$value' ";
        }
        return $output.'>';
    }
}