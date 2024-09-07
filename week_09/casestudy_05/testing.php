<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Prices</title>
</head>
<body>

<h1>Coffee Prices</h1>

<?php
// Database connection
$servername = "localhost"; // Change if different
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "coffee_prices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array of coffee types to fetch prices for
$coffeeTypes = [
    'justjava',
    'cafeaulait_single',
    'cafeaulait_double',
    'icedcappuccino_single',
    'icedcappuccino_double'
];

// Loop through each coffee type
foreach ($coffeeTypes as $coffee) {
    // Prepare the SQL query
    $sql = "SELECT price FROM prices WHERE coffee = '$coffee'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            echo "<h2>Price for " . htmlspecialchars(ucwords(str_replace("_", " ", $coffee))) . ": $" . htmlspecialchars($row['price']) . "</h2>";
        } else {
            echo "<h2>No price found for " . htmlspecialchars(ucwords(str_replace("_", " ", $coffee))) . ".</h2>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

</body>
</html>