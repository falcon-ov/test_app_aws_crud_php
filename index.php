<?php
include 'config.php';

// выборка данных с реплики
$result = $read_db->query("SELECT t.id, t.title, c.name AS category, t.status
                           FROM todos t
                           JOIN categories c ON t.category_id = c.id");

echo "<h1>Список задач</h1>";
echo "<table border='1'>
<tr><th>ID</th><th>Задача</th><th>Категория</th><th>Статус</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['title']}</td>
    <td>{$row['category']}</td>
    <td>{$row['status']}</td>
    </tr>";
}
echo "</table>";
?>
