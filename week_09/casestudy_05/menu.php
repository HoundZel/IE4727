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

    function updateorders($conn, $coffee, $quantity) {
        // Prepare and execute SQL query
        $sql = "UPDATE sales SET quantity = quantity + '$quantity' WHERE coffee = '$coffee'";
        $result = $conn->query($sql);
        
        if ($result) {
            return true; // Return true if successful
        } else {
            return false; // Return false if unsuccessful
        }
    }

    function updaterevenue($conn, $coffee, $revenue) {
        // Prepare and execute SQL query
        $sql = "UPDATE sales SET revenue = revenue + '$revenue' WHERE coffee = '$coffee'";
        $result = $conn->query($sql);
        
        if ($result) {
            return true; // Return true if successful
        } else {
            return false; // Return false if unsuccessful
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update Just Java
        if (isset($_POST['java']) && !empty($_POST['quantity_java'])) {
            $coffee = $_POST['java'];
            $quantity = $_POST['quantity_java'];
            updateorders($conn, $coffee, $quantity);
            $price = getCoffeeRow($conn, $coffee);
            $revenue = $price * $quantity;
            updaterevenue($conn, $coffee, $revenue);
        }
    
        // Update Café au Lait
        if (isset($_POST['cafe']) && !empty($_POST['quantity_cafe'])) {
            $coffee = $_POST['cafe'];
            $quantity = $_POST['quantity_cafe'];
            updateorders($conn, $coffee, $quantity);
            $price = getCoffeeRow($conn, $coffee);
            $revenue = $price * $quantity;
            updaterevenue($conn, $coffee, $revenue);
        }
    
        // Update Iced Cappuccino 
        if (isset($_POST['capuccino']) && !empty($_POST['quantity_capuccino'])) {
            $coffee = $_POST['capuccino'];
            $quantity = $_POST['quantity_capuccino'];
            updateorders($conn, $coffee, $quantity);
            $price = getCoffeeRow($conn, $coffee);
            $revenue = $price * $quantity;
            updaterevenue($conn, $coffee, $revenue);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaJam Coffee House - Menu </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>JavaJam Coffee House</h1>
</header>
<div id="flex-container">
<div id ="navbar"><nav>
    <ul>
        <li><a href="index.html" class="navButton"><b>Home</b></a> &nbsp;</li>
        <br>
        <li><a href="menu.php" class="navButton"><b>Menu</b></a> &nbsp;</li>
        <br>
        <li><a href="Music.html" class="navButton"><b>Music</b></a> &nbsp;</li>
        <br>
        <li><a href="jobs.html" class="navButton"><b>Jobs</b></a>&nbsp;</li>
        <br>
        <hr>
        <br>
        <li><a href="pricing.php" class="navButton"><b>Pricing Update</b></a></li>
        <br>
        <li><a href="sales.php" class="navButton"><b>Sales Report</b></a></li>
    </ul>
</nav></div>
<div id ="content">
    <div id="winding_road">
        <h2>Coffee at JavaJam</h2>
    </div>
    <div id="menu_table">
        <form method="POST" action=""><table border="1">
            <tr>
                <th colspan="3"></th>
                <th>Sub Total</th>
            </tr>
            <tr>
                <td class="itemname"><strong>Just Java</strong></td>
                <td class="itemdesc">
                    Regular house blend, decaffinated coffee, or flavour of the day
                    <br><b>Endless Cup $<?php echo getCoffeeRow($conn, 'justjava'); $price ?>&nbsp<input type="radio" id="javaPrice" class="price" name="java" value="justjava" data-price="<?php echo getCoffeeRow($conn, 'justjava'); $price ?>"checked></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_java" min="0" max="999" placeholder=" No."></td>
                <td class="st">$<span class="subtotal">0.00</span></td>
            </tr>
            <tr>
                <td class="itemname"><strong>Cafe au Lait</strong></td>
                <td class="itemdesc">
                    House blended coffee infused into a smooth, steamed milk
                    <br><b>Single $<?php echo getCoffeeRow($conn, 'cafeaulait_single'); $price ?>&nbsp<input type="radio" class="price" name="cafe" value="cafeaulait_single" data-price="<?php echo getCoffeeRow($conn, 'cafeaulait_single'); $price ?>"> 
                           Double $<?php echo getCoffeeRow($conn, 'cafeaulait_double'); $price ?>&nbsp<input type="radio" class="price" name="cafe" value="cafeaulait_double" data-price="<?php echo getCoffeeRow($conn, 'cafeaulait_double'); $price ?>"></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_cafe" min="0" max="999" placeholder=" No."></td>
                <td class="st">$<span class="subtotal">0.00</span></td>
            </tr>
            <tr>
                <td class="itemname"><strong>Iced Capuccino</strong></td>
                <td class="itemdesc">
                    Sweetened espresson blended with icy-cold milk and served in a chilled glass
                    <br><b>Single $<?php echo getCoffeeRow($conn, 'icedcappuccino_single'); $price ?>&nbsp<input type="radio" class="price" name="capuccino" value="icedcappuccino_single" data-price="<?php echo getCoffeeRow($conn, 'icedcappuccino_single'); $price ?>"> 
                           Double $<?php echo getCoffeeRow($conn, 'icedcappuccino_double'); $price ?>&nbsp<input type="radio" class="price" name="capuccino" value="icedcappuccino_double" data-price="<?php echo getCoffeeRow($conn, 'icedcappuccino_double'); $price ?>"></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_capuccino" min="0" max="999" placeholder=" No."></td>
                <td class="st">$<span class="subtotal">0.00</span></td>
            </tr>
            <tr>
                <td id="gt" colspan="3">Grand Total :</td>
                <td class="st">$<span id="grandtotal">0.00</span></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Order Now!">
        </form>
    </div>
</div>
</div>
<footer>
    <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
    <br><a href="poon@qichuan.com"><i>poon@qichuan.com</i></a>
</footer>
<!-- <script src="menu.js"></script> -->
<script>
    // Function to calculate and update the subtotal for a given item row
    function updateSubtotal(row) {
        // Get the selected radio button value (price)
        const selectedPrice = row.querySelector('input[type="radio"]:checked')?.dataset.price;
        // Get the entered quantity
        const quantity = row.querySelector('.quantity').value;

        // Calculate the subtotal
        const subtotal = selectedPrice * quantity;

        // Update the subtotal display
        row.querySelector('.subtotal').textContent = subtotal.toFixed(2);

        // Call calculateTotal to update the grand total
        calculateTotal();
    }

    // Function to calculate the total price of all items
    function calculateTotal() {
        let total = 0;
        const subtotals = document.querySelectorAll('.subtotal');

        subtotals.forEach(subtotal => {
            total += parseFloat(subtotal.textContent);
        });

        // Update the grand total display
        document.getElementById('grandtotal').textContent = total.toFixed(2);
    }

    // Function to add event listeners to each row
    function attachListeners() {
        // Get all rows that contain item information
        const rows = document.querySelectorAll('tr');

        // Loop through each row and attach listeners to radio buttons and quantity input
        rows.forEach(row => {
            // Attach event listener to all radio buttons within the row
            const priceRadios = row.querySelectorAll('.price');
            priceRadios.forEach(radio => {
                radio.addEventListener('change', () => updateSubtotal(row));
            });

            // Attach event listener to the quantity input within the row
            const quantityInput = row.querySelector('.quantity');
            if (quantityInput) {
                quantityInput.addEventListener('input', () => updateSubtotal(row));
            }
        });
    }

    // Call the function to attach listeners when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', attachListeners);
</script>
</body>
</html>