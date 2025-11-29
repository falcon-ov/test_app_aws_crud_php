<?php
include 'config.php';

$id = 1; // id задачи для изменения
$new_status = "completed";

$sql = "UPDATE todos SET status='$new_status' WHERE id=$id";

if ($write_db->query($sql) === TRUE) {
    echo "Запись обновлена!";
} else {
    echo "Ошибка: " . $write_db->error;
}
?>
