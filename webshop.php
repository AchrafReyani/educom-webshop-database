<?php

function showWebshopStart() {
    echo "<h2>Webshop</h2>";
}

function showWebshopContent() {
    require_once 'db.php';
    $conn = connectToDB();
    $result = getAllProducts($conn);
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $description = $row["description"];
        $price = $row["price"];
        $image = $row["image"];
    
        // Display product information (adjust HTML structure as needed)
        echo "<div class='product'>";
        echo "<p>Product ID: $id</p>";
        echo "<img src='$image' alt='$name'>";
        echo "<h3>$name</h3>";
        //echo "<p>$description</p>";
        echo "<p class='price'>$$price</p>";
        //echo "<a href='product_details.php?id=$id'>View Details</a>";
        echo "</div>";
      }


}


function showWebshopPage() {
    showWebshopStart();
    showWebshopContent();

}

?>