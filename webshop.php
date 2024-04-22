<?php
function showWebshopStart() {
    echo "<h2>Webshop</h2>";
}

function showWebshopContent() {
    require_once 'db.php';
    $conn = connectToDB();
    $result = getAllProducts($conn);

    echo "<div class = 'products'>";
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        //$description = $row["description"];
        $price = $row["price"];
        $image = $row["image"];
    
        // Display product information
        echo "<a href='index.php?page=Product&id=$id' div class='product'>";
        echo "<div class=''>";
        echo "<p>Product ID: $id</p>";
        echo "<img src='$image' alt='$name'>";
        echo "<h3>$name</h3>";
        //echo "<p>$description</p>";
        echo "<p class='price'>$$price</p>";
        echo "</div>";
        echo "</a>";
        if(isUserLoggedIn()) {
            include_once 'shoppingCart.php';
            addToCartButton($id);
        }
      }
      echo "</div>";
}

function showWebshopPage() {
    showWebshopStart();
    showWebshopContent();
}
?>