<?php
require 'dynamodb.php';

try {
    $result = $client->scan(['TableName' => $tableName]);
    $todos = [];
    foreach ($result['Items'] as $item) {
        $todos[] = [
            'todo_id' => $item['todo_id']['S'],
            'title' => $item['title']['S'],
            'category' => $item['category']['S'],
            'status' => $item['status']['S'],
            'created_at' => $item['created_at']['S']
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($todos);
} catch (Aws\DynamoDb\Exception\DynamoDbException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
