<?php
require 'vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;

$client = new DynamoDbClient([
    'region'  => 'eu-central-1',
    'version' => 'latest',
]);

$tableName = 'Todos';
?>
