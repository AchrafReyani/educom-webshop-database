<?php
$servername = "localhost";
$dbusername = "WebShopUser";
$dbpassword = "mBAgRiGMZe7wPq5WAjb6";
$databaseName = "achraf_webshop";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=$databaseName", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 