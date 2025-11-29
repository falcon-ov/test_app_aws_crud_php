<?php
// основной экземпляр для операций записи
$write_db = new mysqli('project-rds-mysql-prod.c5cy66m0io39.eu-central-1.rds.amazonaws.com', 'admin', 'impact7723', 'project_db');

// реплика для операций чтения
$read_db = new mysqli('project-rds-mysql-read-replica.c5cy66m0io39.eu-central-1.rds.amazonaws.com', 'admin', 'impact7723', 'project_db');

// проверка соединения
if ($write_db->connect_error) {
    die("Ошибка подключения к master DB: " . $write_db->connect_error);
}
if ($read_db->connect_error) {
    die("Ошибка подключения к read replica: " . $read_db->connect_error);
}
?>
