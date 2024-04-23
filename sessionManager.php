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