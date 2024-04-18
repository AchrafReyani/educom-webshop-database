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

function getUserInfo($conn, $email)
{
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    return $query;
}

function registerNewUser($conn, $email , $name, $password)
{
    $query = "INSERT INTO users (email, username, pwd) VALUES (\"$email\", \"$name\", \"$password\")";
    mysqli_query($conn, $query);
}

function getCurrentPassword($conn, $email)
{
    $query = mysqli_query($conn, "SELECT pwd FROM users WHERE email = '$email'");
    return $query;
}

function updatePassword($conn, $email, $password)
{
    $query = "UPDATE users SET pwd = '$password' WHERE email = '$email'";
    mysqli_query($conn, $query);
}

function getAllProducts($conn)
{
    $sql = "SELECT id, name, description, price, image FROM products";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}



?>
