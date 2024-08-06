<?php
require 'elastic.php';

$params = [
    'index' => 'myindex',
    'id'    => '1',
    'body'  => ['name' => 'John Doe', 'email' => 'john@example.com']
];

$response = $client->index($params);
print_r($response);
