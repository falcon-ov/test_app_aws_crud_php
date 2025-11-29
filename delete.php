<?php
require 'dynamodb.php';

$data = json_decode(file_get_contents('php://input'), true);
$todo_id = $data['todo_id'];

try {
    $client->deleteItem([
        'TableName' => $tableName,
        'Key' => [
            'todo_id' => ['S' => $todo_id]
        ]
    ]);
    echo json_encode(['success' => true]);
} catch (Aws\DynamoDb\Exception\DynamoDbException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
