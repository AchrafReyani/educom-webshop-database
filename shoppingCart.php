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
    $shoppingCart = getShoppingCart();
    foreach ($shoppingCart as $id => $quantity) {
      echo '<li>id: '.$id.' quantity: '.$quantity.'</li>';
    }
    echo '</ul>';
  }
}

function showShoppingCartPage() {
  showShoppingCartStart();
  showShoppingCartContent();
}
?>