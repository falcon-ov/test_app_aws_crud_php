<?php
include 'config.php';

$title = "Новая задача";
$category_id = 1; // например, категория Work
$status = "pending";

$sql = "INSERT INTO todos (title, category_id, status) VALUES ('$title', $category_id, '$status')";

if ($write_db->query($sql) === TRUE) {
    echo "Запись успешно добавлена!";
} else {
    echo "Ошибка: " . $write_db->error;
}
?>
