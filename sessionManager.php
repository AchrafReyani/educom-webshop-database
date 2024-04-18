<?php
function doLoginUser($username, $email) {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
}

function doLogoutUser() {
    unset($_SESSION['username']);
    unset($_SESSION['email']);
}

function getUsername() {
    return $_SESSION['username'];
}

function isUserLoggedIn() {
    return isset($_SESSION['username']);
}