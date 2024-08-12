<?php
require 'elastic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Documents</title>
</head>
<body>
    <h1>View Indexed Documents</h1>
    <ul>
        <li><a href="index.php">Index Data</a> - Index data into Elasticsearch</li>
        <li><a href="search.php">Search Data</a> - Search data in Elasticsearch</li>
        <li><a href="view.php">View All Documents</a> - View all indexed documents</li>
    </ul>

    <h2>All Documents</h2>
    <?php
    // Prepare Elasticsearch search parameters to fetch all documents
    $params = [
        'index' => 'myindex',
        'body'  => [
            'query' => [
                'match_all' => (object)[]
            ]
        ]
    ];

    try {
        // Fetch all documents from Elasticsearch
        $response = $client->search($params);

        if (isset($response['hits']['hits']) && count($response['hits']['hits']) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
            
            // Loop through the documents and display them
            foreach ($response['hits']['hits'] as $hit) {
                $source = $hit['_source'];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($hit['_id']) . "</td>";
                echo "<td>" . htmlspecialchars($source['name']) . "</td>";
                echo "<td>" . htmlspecialchars($source['email']) . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>No documents found.</p>";
        }
    } catch (Exception $e) {
        echo "<h3>Error Fetching Documents</h3>";
        echo "<pre>";
        echo "Error: " . $e->getMessage();
        echo "</pre>";
    }
    ?>
</body>
</html>