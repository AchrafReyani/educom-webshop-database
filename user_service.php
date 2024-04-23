<?php
function authenticateUserByEmail($email, $password) {
   //TODO 
}

function authenticateUserByIdi($id, $password) {
    //TODO
}

function storeUser($email, $name, $password) {
  //also hashes the password at the moment, could also be a seperate function
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  registerNewUser($email, $name, $hashedPassword);
}
?>