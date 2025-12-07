<?php
require 'vendor/autoload.php';

$mongoUri = getenv("MONGODB_URI");
if (!$mongoUri) {
    die("MongoDB URI not set");
}

try {
    $client = new MongoDB\Client($mongoUri);
} catch (Exception $e) {
    die("MongoDB connection failed: " . $e->getMessage());
}

$collection = $client->Stock->PublicCompanies;

$searchType = $_GET['searchType'] ?? null;
$searchInput = $_GET['searchInput'] ?? null;

if (!$searchType || !$searchInput) {
    die("Missing search input");
}

if ($searchType === "ticker") {
    $filter = ['ticker' => $searchInput];
} else {
    $filter = ['name' => $searchInput];
}

try {
    $results = $collection->find($filter);
    $docs = iterator_to_array($results);
} catch (Exception $e) {
    die("Query failed: " . $e->getMessage());
}

echo "<h2>Search Results</h2>";

if (count($docs) === 0) {
    echo "<p>No results found.</p>";
}

foreach ($docs as $doc) {
    echo "<p>";
    echo "Company: " . htmlspecialchars($doc['name']) . "<br>";
    echo "Ticker: " . htmlspecialchars($doc['ticker']) . "<br>";
    echo "Price: $" . htmlspecialchars($doc['price']) . "<br>";
    echo "</p>";
}
?>
