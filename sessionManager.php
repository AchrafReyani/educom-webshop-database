<?php
function doLoginUser($username, $id) {
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $id;//currently used for changing the user's password
}

function doLogoutUser() {
    unset($_SESSION['username']);
    unset($_SESSION['userid']);
}

function getUsername() {
    return $_SESSION['username'];
}

function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

function makeShoppingCart() {
    $_SESSION['shoppingCart'] = [];
}

//gets called either when an order has been made or if the user logs out.
function removeShoppingCart() {
    unset($_SESSION['shoppingCart']);
}

function addToShoppingCart($id) {
    if (empty($_SESSION['shoppingCart'][$id])) {
        $_SESSION['shoppingCart'][$id] = 1;
    } else {
        $_SESSION['shoppingCart'][$id]++;
    }
}
?>