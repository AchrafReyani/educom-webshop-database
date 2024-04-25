<?php
function showShoppingCartStart() {
  echo "<h2>Shopping Cart</h2>
  <p>Here are the items in your shopping cart:</p>";
}

//display product name, quantity, small image, price, and total price of the whole order
function showShoppingCartContent($data) {
  if (!isset($_SESSION['shoppingCart']) || empty($_SESSION['shoppingCart'])) {
    echo 'Your shopping cart is empty.';
  } else {
    $shoppingCart = getShoppingCart();
    $products = $data['products'];
    $total = 0;
    
    //loop through each item in the shoppingcart and check the database for matching ids
    foreach ($shoppingCart as $id => $quantity) {
      foreach ($data['products'] as $product) {
        if($product['id'] == $id) {
          echo '<div class="shoppingCart">';
          $subtotal = $product['price'] * $quantity;
          $total += $subtotal;
          echo '<img src='.$product['image'].' alt="" class="shoppingCartImage"><ul> <li>'.$product['name'].'</li> <li>quantity: '.$quantity.'</li> <li> subtotal: '.$subtotal.'</li></ul>';
          echo '</div>';
        }
      }
    }
    echo '<p class="shoppingCart">Total: '.$total.'<p>';
  }
}

function showOrderButton() {
  echo "<form action='index.php' method='POST'>
  <input type='hidden' name='action' value='submitShoppingCart'>
  ""
  <input type='hidden' name='page' value='Webshop'>
  <button type='submit'>Place Order</button>
  </form>";
}
 
function showShoppingCartPage($data) {
  showShoppingCartStart();
  showShoppingCartContent($data);
  showOrderButton();
}
?>