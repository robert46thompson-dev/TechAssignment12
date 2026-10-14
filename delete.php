<?php
// input: establish db connection
$dsn = 'mysql:host=loaclhost;dbname=my_guitar_shop';
$username = 'ism330user';
$password = 'password';
$db = new PDO($dsn, $username, $password);

// input: get querystring, 1 pieces of data
$productID = $_GET['productID'];

// processing: insert data into db
$sql_query = "DELETE FROM products WHERE productID='$productID';";
$statement = $db->prepare($sql_query);
$statement->execute();

// output: take user back to index.php
header("Location: index.php");

exit;
