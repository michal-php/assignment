<?php

require_once 'modules/Form.php';

class NSForm extends Form
{
    protected $fields = ['type' => [
                            'type' => 'string',
                            'label' => 'Type',
                            'required' => true,
                            'readonly' => true,
                            'value' => 'NS'],
                        'name' => [
                            'type' => 'string',
                            'label' => 'Name',
                            'required' => true,],
                        'content' => [
                            'type' => 'string',
                            'label' => 'Canonical hostname of the DNS server',
                            'required' => false,
                        ],
                        'ttl' => [
                            'type' => 'integer',
                            'label' => 'TTL',
                            'value' => 600
                        ]];
}