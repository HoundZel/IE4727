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

    function getCoffeeRow($conn, $coffee) {
        // Prepare and execute SQL query
        $sql = "SELECT price FROM prices WHERE coffee = '$coffee'";
        $result = $conn->query($sql);
        
        // Initialize price variable
        $price = "N/A"; // Default value if not found
    
        if ($result) {
            if ($result->num_rows > 0) {
                // Fetch the result
                $row = $result->fetch_assoc();
                $price = htmlspecialchars($row['price']); // Get the price
            }
        }
        return $price; // Return the price
    }

    function updateCoffeePrice($conn, $coffee, $price) {
        // Prepare and execute SQL query
        $sql = "UPDATE prices SET price = '$price' WHERE coffee = '$coffee'";
        $result = $conn->query($sql);
        
        if ($result) {
            return true; // Return true if successful
        } else {
            return false; // Return false if unsuccessful
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update Just Java
        if (isset($_POST['justjava']) && !empty($_POST['justjava_price'])) {
            $price = $_POST['justjava_price'];
            updateCoffeePrice($conn, 'justjava', $price);
        }
    
        // Update Café au Lait Single
        if (isset($_POST['cafeaulait']) && !empty($_POST['cafeaulait_single_price'])) {
            $price = $_POST['cafeaulait_single_price'];
            updateCoffeePrice($conn, 'cafeaulait_single', $price);
        }
    
        // Update Café au Lait Double
        if (isset($_POST['cafeaulait']) && !empty($_POST['cafeaulait_double_price'])) {
            $price = $_POST['cafeaulait_double_price'];
            updateCoffeePrice($conn, 'cafeaulait_double', $price);
        }
    
        // Update Iced Cappuccino Single
        if (isset($_POST['icedcappuccino']) && !empty($_POST['icedcappuccino_single_price'])) {
            $price = $_POST['icedcappuccino_single_price'];
            updateCoffeePrice($conn, 'icedcappuccino_single', $price);
        }
    
        // Update Iced Cappuccino Double
        if (isset($_POST['icedcappuccino']) && !empty($_POST['icedcappuccino_double_price'])) {
            $price = $_POST['icedcappuccino_double_price'];
            updateCoffeePrice($conn, 'icedcappuccino_double', $price);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaJam Coffee House - Pricing Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>JavaJam Coffee House</h1>
</header>
<div id="flex-container">
<div id ="navbar"><nav>
    <ul class="PPU">
        <b>Product</b> &nbsp;
        <br>
        <b>Price</b> &nbsp;
        <br>
        <b>Update</b> &nbsp;
        <br>
        <br>
        <br>
        <li><a href="menu.php" class="navButton"><b>&lt;Back</b></a></li>
    </ul>
</nav></div>
<div id ="content">
    <div id="winding_road">
        <h2>Click to update product prices:</h2>
    </div>
    <div id="menu_table">
    <form method="POST" action="">
        <table border="1">
            <tr>
                <td class="check_box"><input id = "justjava_checkbox" type="checkbox" name="justjava" onclick="toggleInput('justjava_checkbox', 'justjava_price')"></td>
                <td class="itemname"><strong>Just Java</strong></td>
                <td class="itemdesc">
                    Regular house blend, decaffinated coffee, or flavour of the day
                    <br><b>Endless Cup $<?php echo getCoffeeRow($conn, 'justjava'); $price ?>&nbsp<input type="float" id="justjava_price" name="justjava_price" class="price" step="0.01" style="display:none;"></b>
                </td>
            </tr>
            <tr>
                <td class="check_box"><input id="cafeaulait_checkbox" type="checkbox" name="cafeaulait" onclick="toggleInputs('cafeaulait_checkbox', 'cafeaulait_single_price', 'cafeaulait_double_price')"></td>
                <td class="itemname"><strong>Cafe au Lait</strong></td>
                <td class="itemdesc">
                    House blended coffee infused into a smooth, steamed milk
                    <br><b>Single $<?php echo getCoffeeRow($conn, 'cafeaulait_single'); $price ?>&nbsp<input type="float" id="cafeaulait_single_price" name="cafeaulait_single_price" class="price" step="0.01" style="display:none;"></b>
                    <br><b>Double $<?php echo getCoffeeRow($conn, 'cafeaulait_double'); $price ?>&nbsp<input type="float" id="cafeaulait_double_price" name="cafeaulait_double_price" class="price" step="0.01" style="display:none;"></b>
                </td>
            </tr>
            <tr>
                <td class="check_box"><input id="icedcappuccino_checkbox" type="checkbox" name="icedcappuccino" onclick="toggleInputs('icedcappuccino_checkbox', 'icedcappuccino_single_price', 'icedcappuccino_double_price')"></td>
                <td class="itemname"><strong>Iced Capuccino</strong></td>
                <td class="itemdesc">
                    Sweetened espresson blended with icy-cold milk and served in a chilled glass
                    <br><b>Single $<?php echo getCoffeeRow($conn, 'icedcappuccino_single'); $price ?>&nbsp<input type="float" id="icedcappuccino_single_price" name="icedcappuccino_single_price" class="price" step="0.01" style="display:none;"></b>
                    <br><b>Double $<?php echo getCoffeeRow($conn, 'icedcappuccino_double'); $price ?>&nbsp<input type="float" id="icedcappuccino_double_price" name="icedcappuccino_double_price" class="price" step="0.01" style="display:none;"></b>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Update Prices">
    </form>
    </div>
</div>
</div>
<footer>
    <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
    <br><a href="poon@qichuan.com"><i>poon@qichuan.com</i></a>
</footer>
<script>
    function toggleInput(checkboxId, inputId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        input.style.display = checkbox.checked ? 'inline' : 'none';
    }
    function toggleInputs(checkboxId, inputId1, inputId2) {
        const checkbox = document.getElementById(checkboxId);
        const input1 = document.getElementById(inputId1);
        const input2 = document.getElementById(inputId2);
        input1.style.display = checkbox.checked ? 'inline' : 'none';
        input2.style.display = checkbox.checked ? 'inline' : 'none';
    }
</script>
</body>
</html>