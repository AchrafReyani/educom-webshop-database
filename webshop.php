<?php
function showWebshopStart() {
    echo "<h2>Webshop</h2>";
}

function showWebshopContent() {
    try {
    require_once 'db.php';
    $result = getAllProducts();

    echo "<div class = 'products'>";
    foreach ($data['products'] as $product) {
        $id = $product["id"];
        $name = $product["name"];
        //$description = $row["description"];
        $price = $product["price"];
        $image = $product["image"];
    
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
    } catch (Exception $e) {
        $generalError = "Could not connect to the database, You cannot view the webshop at this time. Please try again later.";
    }
    return [ 'generalError' => $generalError ];

}

function showWebshopPage() {
    showWebshopStart();
    showWebshopContent();
}
?>