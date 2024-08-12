<?php
require 'elastic.php';

$params = [
    'index' => 'myindex',
    'body'  => [
        'query' => [
            'match' => [
                'name' => 'John'
            ]
        ]
    ]
];

$response = $client->search($params);
print_r($response);
