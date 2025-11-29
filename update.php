<?php
require 'dynamodb.php';

$data = json_decode(file_get_contents('php://input'), true);
$todo_id = $data['todo_id'];
$status = $data['status'];

try {
    $client->updateItem([
        'TableName' => $tableName,
        'Key' => [
            'todo_id' => ['S' => $todo_id]
        ],
        'UpdateExpression' => 'SET #s = :val',
        'ExpressionAttributeNames' => ['#s' => 'status'],
        'ExpressionAttributeValues' => [':val' => ['S' => $status]]
    ]);
    echo json_encode(['success' => true]);
} catch (Aws\DynamoDb\Exception\DynamoDbException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
