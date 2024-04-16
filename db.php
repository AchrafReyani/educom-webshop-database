<?php
$servername ="localhost";
$dbusername = "WebShopUser";
$dbpassword = "mBAgRiGMZe7wPq5WAjb6";
$dbName = "achraf_webshop";

//create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbName);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>