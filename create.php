<?php
require 'dynamodb.php';

// получаем данные из POST JSON
$data = json_decode(file_get_contents('php://input'), true);
$todo_id = uniqid(); // уникальный id
$title = $data['title'];
$category = $data['category'];
$status = $data['status'];

try {
    $client->putItem([
        'TableName' => $tableName,
        'Item' => [
            'todo_id' => ['S' => $todo_id],
            'title' => ['S' => $title],
            'category' => ['S' => $category],
            'status' => ['S' => $status],
            'created_at' => ['S' => date('c')]
        ]
    ]);
    echo json_encode(['success' => true, 'todo_id' => $todo_id]);
} catch (Aws\DynamoDb\Exception\DynamoDbException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
