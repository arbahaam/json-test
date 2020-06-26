<?php
// First we create connection file to connect database
// Second we create variable and give value as server user db adn pass for connection
$serverName ="localhost";
$userName = "root";
$pass = "";
$db = "azizli";

// to cheking connection we create a variable and value as connection code
$connect=mysqli_connect($serverName, $userName, $pass, $db);
// setting charset for alfabet
mysqli_set_charset($connect,"UTF-8");

mysqli_query($connect, "SET NAMES UTF8");


?>