<?php

require_once 'modules/Form.php';

class AAAAForm extends Form
{
    protected $fields = ['type' => [
                            'type' => 'string',
                            'label' => 'Type',
                            'required' => true,
                            'readonly' => true,
                            'value' => 'AAAA'],
                        'name' => [
                            'type' => 'string',
                            'label' => 'Name',
                            'required' => true,],
                        'content' => [
                            'type' => 'string',
                            'label' => 'IPv6 address',
                            'required' => true,
                        ],
                        'ttl' => [
                            'type' => 'integer',
                            'label' => 'TTL',
                            'value' => 600
                        ]];
}