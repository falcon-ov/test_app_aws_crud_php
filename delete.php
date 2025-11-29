<?php
include 'config.php';

$id = 2; // id задачи для удаления

$sql = "DELETE FROM todos WHERE id=$id";

if ($write_db->query($sql) === TRUE) {
    echo "Запись удалена!";
} else {
    echo "Ошибка: " . $write_db->error;
}
?>
