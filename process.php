<?php
require 'vendor/autoload.php';

// Connect to MongoDB
$client = new MongoDB\Client($_ENV['MONGODB_URI']);

// Select database + collection
$collection = $client->Stock->PublicCompanies;

// Read form data
$searchType = $_GET['searchType'];     
$searchInput = $_GET['searchInput'];   

// Build query
if ($searchType === "ticker") {
    $filter = ['ticker' => $searchInput];
} else {
    $filter = ['company' => $searchInput];
}

// Query MongoDB
$results = $collection->find($filter);

// Display results in the PHP console (Apache error log)
foreach ($results as $doc) {
    error_log("Company: " . $doc['company']);
    error_log("Ticker: " . $doc['ticker']);
    error_log("Price: " . $doc['price']);
}

// Extra credit: show results on a web page
echo "<h2>Search Results</h2>";

foreach ($results as $doc) {
    echo "<p>";
    echo "Company: " . $doc['company'] . "<br>";
    echo "Ticker: " . $doc['ticker'] . "<br>";
    echo "Price: $" . $doc['price'] . "<br>";
    echo "</p>";
}
?>
