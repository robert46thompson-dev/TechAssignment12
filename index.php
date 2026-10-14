<?php
// input: database connection
$dsn = 'mysql:host=loaclhost;dbname=my_guitar_shop';
$username = 'ism330user';
$password = 'password';
$db = new PDO($dsn, $username, $password);

//processing: run sql query
$sql = "SELECT * FROM products;";
$statement = $db->prepare($sql);
$statement->execute();
$products = $statement->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- output goes here -->
    <table>
        <tr>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        foreach ($products as $product) {
            $productID = $product['productID'];
            $productName = $product['productName'];
            $price = $product['price'];
            $quantity = $product['quantity'];
            echo "<tr>
        <td>{$productID}</td>
        <td>{$productName}</td>
        <td>{$price}</td>
        <td>{$quantity}</td>
        <td>
            <form action='delete.php'>
                Product Id:<input type='text' name='productID' value='$productID'/>
                <input type='submit' value='Delete' />
            </form>
        </td>
        </tr>";
        }
        ?>
    </table>
    <form action="add.php">
        <br><br>
        Product Name: <input type="text" name="p_name">
        <br><br>
        Product Price: <input type="text" name="p_price">
        <br><br>
        Product Quantity On Hand: <input type="text" name="p_quantity">
        <br><br>
        <input type="submit" value="Add Product">
    </form>
</body>

</html>