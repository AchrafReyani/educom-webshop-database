<?php

function showShoppingCartStart() {
    echo "<h2>Shopping Cart</h2>
    <p>Here are the items in your shopping cart:</p>";
}

function addToCartButton($id) {
    echo "<a href=\"addToCart.php?id=$id\">Add to Cart</a>";
}

function showShoppingCartContent() {

}


function showShoppingCartPage() {
    showShoppingCartStart();
    showShoppingCartContent();
}
?>