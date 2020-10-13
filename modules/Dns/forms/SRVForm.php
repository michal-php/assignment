<?php

require_once 'modules/Form.php';

class SRVForm extends Form
{
    protected $fields = ['type' => [
                            'type' => 'string',
                            'label' => 'Type',
                            'required' => true,
                            'readonly' => true,
                            'value' => 'SRV'],
                        'name' => [
                            'type' => 'string',
                            'label' => 'Name',
                            'required' => true,],
                        'content' => [
                            'type' => 'string',
                            'label' => 'Canonical hostname of the machine providing the service',
                            'required' => true,
                        ],
                        'prio' => [
                            'type' => 'integer',
                            'label' => 'Priority',
                            'required' => true
                        ],
                        'port' => [
                            'type' => 'integer',
                            'label' => 'Port',
                            'required' => true
                        ],
                        'weight' => [
                            'type' => 'integer',
                            'label' => 'Weight',
                            'required' => true
                        ],
                        'ttl' => [
                            'type' => 'integer',
                            'label' => 'TTL',
                            'value' => 600
                        ]];
}