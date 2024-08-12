<?php
require 'vendor/autoload.php';
//require 'C:/xampp/htdocs/practice/phpcodebase/projects/elasticsearch/vendor/autoload.php';

//use Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\ClientBuilder;

try {
    $client = ClientBuilder::create()->setHosts(['localhost:9200'])
        ->setBasicAuthentication('elastic', 'elastic')
        ->build();
    echo "Elasticsearch client created successfully.". PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}