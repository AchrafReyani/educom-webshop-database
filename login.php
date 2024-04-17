<?php 


function validateLogin() {
    $email = $password = $username= "";   
    $loginError = $emailError = $passwordError = "";

    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["email"])) {
      $emailError = "Email is required";
    } else {
      $email = $_POST['email'];
    }

    if (empty($_POST["password"])) {
      $passwordError = "Password is required";
    } else {
      $password = $_POST['password'];
    }

    //logic to check file for valid userinfo
    require_once 'db.php';

    $sql = "INSERT INTO users (email, username, pwd) VALUES (\"$email\", \"$name\", \"$password\")";
    
    if (mysqli_query($conn, $sql)) {
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
    //die();
  }

    //$valid = true when email and password combination is found in file

    return [ 'valid' => $valid, 'email' => $email, 'password' => $password,  'loginError' => $loginError,  
              'emailError' => $emailError, 'passwordError' => $passwordError, 'username' => $username];

  }

  function showLoginStart() {
    echo "<h2>Login</h2>
    <p>Please enter your email and password to Login.</p>
    <form action=\"index.php\" method=\"post\">
    <input name=\"page\" value=\"Login\" type=\"hidden\">";
  }
  
  function showLoginEnd($errorMessage, $data) {
     echo "<div>
     <span>* " . $data[$errorMessage]  . "</span>
     <input type=\"submit\" value=\"Send\">
     </div>
   </form>";
  }
  
  function showLoginField($fieldName, $label, $data) {
  
     echo "
     <div>
     <label for=\"$fieldName\">$label:</label>
     <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
     <span>* " . $data[$fieldName . "Error"]  . "</span>
     </div>";
  
   }

    function showLoginPage($data){

      showLoginStart();
      showLoginField("email", "Email", $data);
      showLoginField("password", "Password", $data);
      showLoginEnd('loginError', $data);
        
    }

?>