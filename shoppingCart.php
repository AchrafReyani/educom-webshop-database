<?php
function showShoppingCartStart() {
  echo "<h2>Shopping Cart</h2>
  <p>Here are the items in your shopping cart:</p>";
}

//display product name, quantity, small image, price, and total price of the whole order
function showShoppingCartContent() {
  if (!isset($_SESSION['shoppingCart']) || empty($_SESSION['shoppingCart'])) {
    echo 'Your shopping cart is empty.';
  } else {
    echo '<ul class="shoppingCart">';
    foreach ($_SESSION['shoppingCart'] as $id => $quantity) {
      include_once 'db.php';
      $productDetails = getProductDetails($id);
      if ($productDetails) {
        echo '<li>';
        echo $productDetails['name'] . ' (Quantity: ' . $quantity . ')';
        echo $productDetails['image'];
        echo $productDetails['price'];
        echo '</li>';
        } else {
        echo '<li>Product with ID ' . $id . ' not found.</li>';
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