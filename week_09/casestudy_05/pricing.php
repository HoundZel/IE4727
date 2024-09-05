<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaJam Coffee House - Pricing </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>JavaJam Coffee House</h1>
</header>
<div id="flex-container">
<div id ="navbar"><nav>
    <ul class="PPU">
        <li><b>Product</b> &nbsp;</li>
        <li><b>Price</b> &nbsp;</li>
        <li><b>Update</b> &nbsp;</li>
    </ul>
</nav></div>
<div id ="content">
    <div id="winding_road">
        <h2>Coffee at JavaJam</h2>
    </div>
    <div id="menu_table">
        <table border="1">
            <tr>
                <th>Check</th>
                <th colspan="2"></th>
                <th>New Price</th>
            </tr>
            <tr>
                <td class="st">$<span class="subtotal">0.00</span></td>
                <td class="itemname"><strong>Just Java</strong></td>
                <td class="itemdesc">
                    Regular house blend, decaffinated coffee, or flavour of the day
                    <br><b>Endless Cup $2.00  <input type="radio" id="javaPrice" class="price" name="java" value="2" checked></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_java" min="0" max="999" placeholder=" No."></td>
            </tr>
            <tr>
                <td class="st">$<span class="subtotal">0.00</span></td>
                <td class="itemname"><strong>Cafe au Lait</strong></td>
                <td class="itemdesc">
                    House blended coffee infused into a smooth, steamed milk
                    <br><b>Single $2.00 <input type="radio" class="price" name="cafe" value="2"> Double $3.00 <input type="radio" class="price" name="cafe" value="3"></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_cafe" min="0" max="999" placeholder=" No."></td>
            </tr>
            <tr>
                <td class="st">$<span class="subtotal">0.00</span></td>
                <td class="itemname"><strong>Iced Capuccino</strong></td>
                <td class="itemdesc">
                    Sweetened espresson blended with icy-cold milk and served in a chilled glass
                    <br><b>Single $4.75 <input type="radio" class="price" id="capuccinoPrice" name="capuccino" value="4.75"> Double $5.75 <input type="radio" class="price" name="capuccino" value="5.75"></b>
                </td>
                <td><input type="number" class="quantity" name="quantity_capuccino" min="0" max="999" placeholder=" No."></td>
            </tr>
            <tr>
                <td id="gt" colspan="4"><button type="submit" class="button-13">Update</button></td>
            </tr>
        </table>
    </div>
</div>
</div>
<footer>
    <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
    <br><a href="poon@qichuan.com"><i>poon@qichuan.com</i></a>
</footer>
<script src="menu.js"></script>
</body>
</html>