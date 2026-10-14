<?php
// input: establish db connection
$dsn = 'mysql:host=loaclhost;dbname=my_guitar_shop';
$username = 'ism330user';
$password = 'password';
$db = new PDO($dsn, $username, $password);

// input: get querystring, 3 pieces of data
$p_name = $_GET['p_name'];
$p_price = $_GET['p_price'];
$p_quantity = $_GET['p_quantity'];

// processing: insert data into db
$sql_query = "INSERT INTO products (productName, price, quantity)
VALUES ('$p_name', '$p_price','$p_quantity');";
$statement = $db->prepare($sql_query);
$statement->execute();

// output: take user back to index.php
header("Location: index.php");

exit;
