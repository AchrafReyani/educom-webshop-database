<?php
function connectToDB() {
try {
    $servername ="localhost";
    $dbusername = "WebShopUser";
        $dbpassword = "mBAgRiGMZe7wPq5WAjb6";
    $dbName = "achraf_webshop";
    // create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbName);

    // check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    return $conn;
} catch (Exception $e) {
    // Handle the exception gracefully
    die("Error: " . $e->getMessage());
}
}

function getUserInfo($conn, $email, $password)
{
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pwd = '$password'");
    return $query;
}


?>
