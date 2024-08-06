<?php
require 'config.php';

$sql = "INSERT INTO users (name, email) VALUES (?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute(['John Doe', 'john@example.com']);

echo "New record created successfully";
