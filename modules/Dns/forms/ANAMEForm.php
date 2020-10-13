<?php

require_once 'modules/Form.php';

class ANAMEForm extends Form
{
    protected $fields = ['type' => [
                            'type' => 'string',
                            'label' => 'Type',
                            'required' => true,
                            'readonly' => true,
                            'value' => 'ANAME'],
                        'name' => [
                            'type' => 'string',
                            'label' => 'Name',
                            'required' => true,],
                        'content' => [
                            'type' => 'string',
                            'label' => 'Canonical hostname',
                            'required' => true,
                        ],
                        'ttl' => [
                            'type' => 'integer',
                            'label' => 'TTL',
                            'value' => 600
                        ]];
}