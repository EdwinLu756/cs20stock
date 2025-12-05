<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Assignment - Home</title>
    <style>
        /* Basic styling for the form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 300px;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 15px;
        }
    </style>
    
    <body>
        <!-- Form for input -->
        <form method="GET" action="process.php">
            <label for="searchType">Search by:</label><br>
            <input type="radio" id="ticker" name="searchType" value="ticker" checked>
            <label for="ticker">Ticker Symbol</label><br>
            <input type="radio" id="company" name="searchType" value="company">
            <label for="company">Company Name</label><br><br>
            
            <label for="searchInput">Enter Ticker Symbol or Company Name:</label><br>
            <input type="text" id="searchInput" name="searchInput" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </body>
</html>