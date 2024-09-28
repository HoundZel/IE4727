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

    function sales_prod($conn) {
        // SQL query to sum quantities and revenues by product
        $sql = "
            SELECT 
                product, 
                SUM(quantity) AS total_quantity, 
                SUM(revenue) AS total_revenue 
            FROM 
                sales 
            GROUP BY 
                product
            ORDER BY 
                product;
        ";
    
        // Execute the query
        $result = $conn->query($sql);
    
        // Check if the query was successful
        if ($result === FALSE) {
            echo "Error: " . $conn->error;
            return;
        }
    
        // Start the HTML table
        echo '<table border="1">';
        echo '<tr><th>Product</th><th>Quantity</th><th>Revenue</th></tr>';
    
        // Fetch and display the results
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['product']) . '</td>';
            echo '<td>' . htmlspecialchars($row['total_quantity']) . '</td>';
            echo '<td>$' . number_format($row['total_revenue'], 2) . '</td>';
            echo '</tr>';
        }
    
        // Close the table
        echo '</table>';
    }

    function sales_cat($conn) {
        // SQL query to sum quantities and revenues by product
        $sql = "
            SELECT 
                category, 
                SUM(quantity) AS total_quantity, 
                SUM(revenue) AS total_revenue 
            FROM 
                sales 
            GROUP BY 
                category
            ORDER BY 
                category;
        ";
    
        // Execute the query
        $result = $conn->query($sql);
    
        // Check if the query was successful
        if ($result === FALSE) {
            echo "Error: " . $conn->error;
            return;
        }
    
        // Start the HTML table
        echo '<table border="1">';
        echo '<tr><th>category</th><th>Quantity</th><th>Revenue</th></tr>';
    
        // Fetch and display the results
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['category']) . '</td>';
            echo '<td>' . htmlspecialchars($row['total_quantity']) . '</td>';
            echo '<td>$' . number_format($row['total_revenue'], 2) . '</td>';
            echo '</tr>';
        }
    
        // Close the table
        echo '</table>';
    }

    function totalrevenue($conn) {
        // Prepare and execute SQL query
        $sql = "SELECT SUM(revenue) AS total FROM sales;";
        $result = $conn->query($sql);
        
        // Initialize revenue variable
        $totalRevenue = "N/A"; // Default value if not found
    
        if ($result) {
            if ($result->num_rows > 0) {
                // Fetch the result
                $row = $result->fetch_assoc();
                $totalRevenue = htmlspecialchars($row['total']); // Get the total revenue
            }
        }
        
        return $totalRevenue; // Return the total revenue
    }
?>

<style>
  #salestable{
      display: flex;
      justify-content: left;
      padding-left: 7vw;
  }
  #salestable table{
      margin: auto;
      width: 65vw;
      height:30vh;
      border-spacing: 0;
  }
  #salestable th{
      color: #441613;
  }
  #salestable table td{
      font-size: 2em;
      font-family: "MV Boli", Times, serif;
  }
  #salestable td{
      color: #441613;
      padding:20px;
      border-style: none;
  }

  /* Hide the default checkbox */
  input[type="checkbox"] {
      display: none; /* Hide the default checkbox */
  }

  /* Style the custom checkbox */
  .custom-checkbox {
      width: 30px; /* Width of the checkbox */
      height: 30px; /* Height of the checkbox */
      border: 2px solid #441613; /* Border color */
      border-radius: 5px; /* Rounded corners */
      display: inline-block;
      position: relative;
      cursor: pointer;
      transition: background-color 0.2s;
  }

  /* Change background color when checked */
  input[type="checkbox"]:checked + .custom-checkbox {
      background-color: #91643D; /* Background color when checked */
  }

  /* Create the tick mark */
  .custom-checkbox::after {
      content: '';
      position: absolute;
      left: 8px; /* Position of the tick */
      top: 2px; /* Position of the tick */
      width: 10px; /* Width of the tick */
      height: 15px; /* Height of the tick */
      border: solid white; /* Tick color */
      border-width: 0 3px 3px 0; /* Thickness of the tick */
      transform: rotate(45deg); /* Rotate to form a tick */
      opacity: 0; /* Initially hidden */
      transition: opacity 0.2s;
  }

  /* Show the tick mark when checked */
  input[type="checkbox"]:checked + .custom-checkbox::after {
      opacity: 1; /* Show the tick */
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaJam Coffee House - Sales Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>JavaJam Coffee House</h1>
</header>
<div id="flex-container">
<div id ="navbar"><nav>
    <ul class="PPU">
        <b>Daily</b> &nbsp;
        <br>
        <b>Sales</b> &nbsp;
        <br>
        <b>Report</b> &nbsp;
        <br>
        <br>
        <br>
        <li><a href="sales.php" class="navButton"><b>&lt;Back</b></a></li>
    </ul>
</nav></div>
<div id ="content">
    <div id="salestable">
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if the sales_prod checkbox is checked
                if (isset($_POST['sales_prod'])) {
                    sales_prod($conn);
                }
        ?>
    </div>
        <br>
    <div id="salestable">
        <?php
                // Check if the sales_cat checkbox is checked
                if (isset($_POST['sales_cat'])) {
                    sales_cat($conn);
                }
            
                // You can also perform other actions based on the checked boxes
            }
        ?>
    </div>
    <div id="winding_road">
        <h2 style="text-align:center;">total Sales: $&nbsp;<?php echo totalrevenue($conn); ?></h2>
    </div>
</div>
</div>
<footer>
    <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
    <br><a href="poon@qichuan.com"><i>poon@qichuan.com</i></a>
</footer>
</body>
</html>