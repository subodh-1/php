<?php
require 'elastic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elasticsearch Index</title>
</head>
<body>
    <h1>Elasticsearch Operations</h1>
    <ul>
        <li><a href="insert.php">Insert Data</a> - Insert data into MySQL</li>
        <li><a href="fetch.php">Fetch Data</a> - Fetch data from MySQL</li>
        <li><a href="index.php">Index Data</a> - Index data into Elasticsearch</li>
        <li><a href="search.php">Search Data</a> - Search data in Elasticsearch</li>
    </ul>

    <h2>Index Document</h2>
    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Index Document">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Prepare Elasticsearch parameters
        $params = [
            'index' => 'myindex',
            'id'    => $id,
            'body'  => ['name' => $name, 'email' => $email]
        ];

        try {
            // Index document into Elasticsearch
            $response = $client->index($params);
            echo "<h3>Document Indexed Successfully</h3>";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
        } catch (Exception $e) {
            echo "<h3>Error Indexing Document</h3>";
            echo "<pre>";
            echo "Error: " . $e->getMessage();
            echo "</pre>";
        }
    }
    ?>
</body>
</html>
