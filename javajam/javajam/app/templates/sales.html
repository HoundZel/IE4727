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

    function popular($conn) {
        // Prepare and execute SQL query
        $sql = "
            SELECT product, category, quantity
            FROM sales
            WHERE quantity = (SELECT MAX(quantity) FROM sales);";
        $result = $conn->query($sql);
        
        // Initialize prod and cat variable
        $product = "N/A"; 
        $category = "N/A"; 
        $quantity = 0;
    
        if ($result) {
            if ($result->num_rows > 0) {
                // Fetch the result
                $row = $result->fetch_assoc();
                $product = htmlspecialchars($row['product']);
                $category = htmlspecialchars($row['category']);
                $quantity = htmlspecialchars($row['quantity']);
            }
        }
        if ($quantity == 0) {
            echo "No sales recorded";
        }else{
            echo $product.' (' . $category .')'; 
        }
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
        <li><a href="menu.php" class="navButton"><b>&lt;Back</b></a></li>
    </ul>
</nav></div>
<div id ="content">
    <div id="winding_road">
        <h2>Click to generate daily sales report:</h2>
    </div>
    <div id="salestable">
      <form method="POST" action="generate.php">
          <table>
              <tr>
                  <td class="check_box"><label><input type="checkbox" name="sales_prod"><span class="custom-checkbox"></span></label></td>
                  <td class="report_desc"><strong>Total dollar and quantity sales by products.</strong></td>
              </tr>
              <tr>
                  <td class="check_box"><label><input type="checkbox" name="sales_cat"><span class="custom-checkbox"></span></label></td>
                  <td class="report_desc"><strong>Total dollar and quantity sales by categories.</strong></td>
              </tr>
          </table>
    </div>
    <div id="winding_road">
        <h2>Popular option of the best selling product: <u><?php echo popular($conn); ?></u></h2>
    </div>
      <input type="submit" value="Generate">
      </form>
</div>
</div>
<footer>
    <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
    <br><a href="poon@qichuan.com"><i>poon@qichuan.com</i></a>
</footer>
</body>
</html>