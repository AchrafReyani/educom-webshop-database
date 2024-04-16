<?php
function doLoginUser($username) {
    $_SESSION['username'] = $username;
}

function doLogoutUser() {
    unset($_SESSION['username']);
}

function getUsername() {
    return $_SESSION['username'];
}

function isUserLoggedIn() {
    return isset($_SESSION['username']);
}