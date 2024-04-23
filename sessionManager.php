<?php
function doLoginUser($username, $email) {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;//currently used for changing the user's password
}

function doLogoutUser() {
    unset($_SESSION['username']);
    unset($_SESSION['email']);
}

function getUsername() {
    return $_SESSION['username'];
}

function isUserLoggedIn() {
    echo 'isUserLoggedIn';
    return isset($_SESSION['username']);
}