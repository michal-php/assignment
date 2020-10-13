<?php

require_once 'services/DNSManagment.php';
require_once 'modules/Module.php';
require_once 'modules/Dns/forms/AForm.php';
require_once 'modules/Dns/forms/AAAAForm.php';
require_once 'modules/Dns/forms/MXForm.php';
require_once 'modules/Dns/forms/ANAMEForm.php';
require_once 'modules/Dns/forms/CNAMEForm.php';
require_once 'modules/Dns/forms/NSForm.php';
require_once 'modules/Dns/forms/SRVForm.php';
require_once 'modules/Dns/forms/TXTForm.php';

class Dns extends Module
{

    var $types = ['A', 'AAAA', 'MX', 'ANAME', 'CNAME', 'NS', 'TXT', 'SRV'];

    public function listAction(){
        $manager = new DNSManagment();
        $records = $manager->listRecords(Config::DOMAIN);

        $records = json_decode($records);

        echo $this->getListView($records, 'Dns');
    }

    public function deleteAction(){
        $record_id = $_GET['record'];

        $manager = new DNSManagment();
        $result = $manager->deleteRecord(Config::DOMAIN, $record_id);
        $result = json_decode($result);

        if (!empty($result->id)){
            echo $this->getSuccessMessage("Record with id $result->id was deleted" );
        }else {
            echo $this->getErrorMessage("Error while deleting record $record_id");
        }
        $this->listAction();
    }

    public function createAction(){
        $type = $_GET['type'].'Form';
        if (empty($_GET['type'])){
            $type = $_POST['type'].'Form';
        }


        $form = new $type('Dns', 'save', 'POST');
        echo $form->getForm();
    }

    public function saveAction(){
        $type = $_POST['type'].'Form';
        $form = new $type('Dns', 'save', 'POST');
        $data = $form->getData();

        $manager = new DNSManagment();
        $result =  $manager->createRecord(Config::DOMAIN, $data);

        $result = json_decode($result);

        if($result->status == 'success'){
            echo $this->getSuccessMessage('Record saved');
            $this->listAction();
            return;
        }else{
            echo $this->getErrorMessage('Error saving record. Message: '.$result->errors->content[0]);
            $this->createAction();
            return ;
        }
    }

    protected function getListViewHeader(){
        $output ='<div class="dropdown">
                    <button class="dropbtn">Add record</button>
                    <div class="dropdown-content">';

        foreach ($this->types as $type){
            $output .= "<a href='?".http_build_query(['type' => $type, 'module' => 'Dns', 'action' => 'create' ])."'>+ $type</a>";
        }

        $output .= '</div></div>';
        return $output;
    }
}