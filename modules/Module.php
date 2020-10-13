<?php


class Module
{

    public function init(){
        echo $this->getHeader();
    }

    public function finish(){
        echo $this->getFooter();
    }

    protected function getHeader(){
        $css = ['css/main.css'];

        $output = '<!DOCTYPE html><html><head>';
        $output .= '<link rel="stylesheet" type="text/css" href="';
        $output .= implode('"><link rel="stylesheet" type="text/css" href="', $css);
        $output .= '"></head><body>';

        return $output;
    }

    protected function getFooter(){
        return '</body></html>';
    }

    protected function getListViewHeader(){
        return '<button type="button">Create New</button>';
    }

    protected function getListView($records, $module){
        $output = $this->getListViewHeader();
        $output .= $this->getListTable($records, $module);
        return $output;
    }

    protected function getListTable($records, $module){
        $header = ['type' => 'Type', 'id' => 'ID', 'name' => 'Name', 'content' => 'Content', 'ttl' => 'TTL', 'note' => 'Note'];
        $options = ['delete'];

        $output = '<table class="list-view-table"><tr><th>'.implode('</th><th>', $header).'</th><th></th></tr>';

        foreach($records->items as $item){
            $output .= '<tr>';
            foreach($header as $column => $name){
                $output .= '<td>'.$item->$column.'</td>';
            }
            $output .= '<td>';
            foreach($options as $option){
                $output .= "<a href='?".http_build_query(['module' => $module, 'action' => $option, 'record' =>$item->id])."' >$option</a> ";
            }
            $output .= '</td></tr>';
        }
        return $output.'</table>';
    }

    public function getSuccessMessage($message){
        return '<div class="alert success">
                  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>'.
                $message.'</div>';
    }

    public function getErrorMessage($message){
        return '<div class="alert">
                  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>'.
                $message.'</div>';
    }

}