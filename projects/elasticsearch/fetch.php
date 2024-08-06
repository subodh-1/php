<?php
require 'config.php';

$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch())
{
    echo $row['name'] . '<br>';
}
