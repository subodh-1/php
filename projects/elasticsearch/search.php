<?php
require 'elastic.php';
?>
<?php
    if (isset($_POST['ajax']) && $_POST['ajax'] == '1') {
        header('Content-Type: application/json');

        // Get search query
        $query = $_POST['query'];

        // Prepare Elasticsearch search parameters
        $params = [
            'index' => 'myindex',
            'body'  => [
                'query' => [
                    'match' => [
                        'name' => $query
                    ]
                ]
            ]
        ];

        try {
            // Search documents in Elasticsearch
            $response = $client->search($params);

            // Format and output results as JSON
            $results = [];
            foreach ($response['hits']['hits'] as $hit) {
                $results[] = [
                    'id' => $hit['_id'],
                    'name' => $hit['_source']['name'],
                    'email' => $hit['_source']['email']
                ];
            }

            echo json_encode($results); exit;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]); exit;
        }

        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elasticsearch Search</title>
    <style>
        #results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Elasticsearch Search</h1>
    <ul>
        <li><a href="index.php">Index Data</a> - Index data into Elasticsearch</li>
        <li><a href="search.php">Search Data</a> - Search data in Elasticsearch</li>
        <li><a href="view.php">View Data</a> - List all data in Elasticsearch</li>
    </ul>

    <h2>Search Document</h2>
    <label for="query">Search Query:</label>
    <input type="text" id="query" name="query" required><br><br>

    <div id="results"></div>

    <script>
        document.getElementById('query').addEventListener('input', function() {
            const query = this.value;

            if (query.length === 0) {
                document.getElementById('results').innerHTML = '';
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'search.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('results').innerHTML = xhr.responseText;
                }
            };

            xhr.send('query=' + encodeURIComponent(query) + '&ajax=1');
        });
    </script>
    
</body>
</html>
