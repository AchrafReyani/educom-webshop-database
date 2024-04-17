<?php
$servername ="localhost";
$dbusername = "WebShopUser";
$dbpassword = "mBAgRiGMZe7wPq5WAjb6";
$dbName = "achraf_webshop";


try {
    // create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbName);

    // check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Handle the exception gracefully
    die("Error: " . $e->getMessage());
}
?>
