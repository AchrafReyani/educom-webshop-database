<?php
function showProductStart() {
    echo "<h2>Product details</h2>";
}

function showProductContent() {
  // Get product ID from URL
  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  echo "Product ID: $id";

  // Connect to database and get product details
  require_once 'db.php';
  $conn = connectToDB();
  $result = getProductDetails($conn, $id);

  //TODO probably doesn't have to be a while loop but will only run once anyway since there cannot be more entries with the same id
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $name = $row["name"];
    $description = $row["description"];
    $price = $row["price"];
    $image = $row["image"];
  
    // Display product information
    echo "<div class='product-details'>";
    echo "<div class=''>";
    echo "<p>Product ID: $id</p>";
    echo "<img src='$image' alt='$name'>";
    echo "<h3>$name</h3>";
    echo "<p>$description</p>";
    echo "<p class='price'>$$price</p>";
    echo "</div>";
    echo "</div>";
  }
}

function showProductPage() {
    showProductStart();
    showProductContent();
}
?>