<?php
function connectToDB() {
    $servername ="localhost";
    $dbusername = "WebShopUser";
    $dbpassword = "mBAgRiGMZe7wPq5WAjb6";
    $dbName = "achraf_webshop";
    // create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbName);
    return $conn;
}

//where is this function called?
function getUserInfo($email) {
    $conn = connectToDB();
    $emailEscape = mysqli_real_escape_string($conn, $email);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailEscape'");
    $user = mysqli_fetch_assoc($query);
    mysqli_close($conn);
    return $user;
}
  

function registerNewUser($conn, $email, $name, $password) {
    //use a prepared statement to safely insert user data
    $stmt = mysqli_prepare($conn, "INSERT INTO users (email, username, pwd) VALUES (?, ?, ?)");
    if (!$stmt) {
      die("Error preparing statement: " . mysqli_error($conn));
    }
  
    // Bind values using parameter types
    mysqli_stmt_bind_param($stmt, "sss", $email, $name, $password);
  
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      echo "User registration successful!";
    } else {
      echo "Error registering user: " . mysqli_stmt_error($stmt);
    }
  
    // Close the statement
    mysqli_stmt_close($stmt);
  }


function getCurrentPassword($email) {
    $conn = connectToDB();
    $emailEscape = mysqli_real_escape_string($conn, $email);
    $query = mysqli_query($conn, "SELECT pwd FROM users WHERE email = '$emailEscape'");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($conn);
    return $row;
}

function updatePassword($conn, $email, $password) {
    $conn = connectToDB();
    $emailEscape = mysqli_real_escape_string($conn, $email);
    $passwordEscape = mysqli_real_escape_string($conn, $password);
    
    $query = "UPDATE users SET pwd = '$passwordEscape' WHERE email = '$emailEscape'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}

function getAllProducts() {
    $conn = connectToDB();
    $sql = "SELECT id, name, description, price, image FROM products";
    $query = mysqli_query($conn, $sql);
    return $query;
}

function getProductDetails($conn, $id) {
    $idEscape = mysqli_real_escape_string($conn, $id);
    
    $sql = "SELECT * FROM products WHERE id = $idEscape";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}
?>
