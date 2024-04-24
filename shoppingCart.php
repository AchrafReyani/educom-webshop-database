<?php

function showShoppingCartStart() {
    echo "<h2>Shopping Cart</h2>
    <p>Here are the items in your shopping cart:</p>";
}

function showShoppingCartContent() {
    if (!isset($_SESSION['shoppingCart']) || empty($_SESSION['shoppingCart'])) {
      echo 'Your shopping cart is empty.';
    } else {
      echo '<h3>Your Shopping Cart:</h3>';
      echo '<ul>';
      foreach ($_SESSION['shoppingCart'] as $itemId => $quantity) {
        // Assuming you have a function to get product details (replace with yours)
        $productDetails = getProductDetails($itemId);
        if ($productDetails) {
          echo '<li>';
          // Display product details (name, price, etc.) based on $productDetails
          echo $productDetails['name'] . ' (Quantity: ' . $quantity . ')';
          echo '</li>';
        } else {
          echo '<li>Product with ID ' . $itemId . ' not found.</li>';
        }
      }
      echo '</ul>';
    }
  }


function showShoppingCartPage() {
    showShoppingCartStart();
    showShoppingCartContent();
}
?>