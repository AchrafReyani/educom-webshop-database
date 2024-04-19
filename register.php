<?php 
  function validateRegistration() {

        $email = $name = $password = $confirm_password = "";
        $emailError = $nameError = $passwordError = $confirm_passwordError = "";
        $valid = false;

        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
      //save input if valid and send error message when not valid
     
     //if email is empty give required error, if it exists check for duplicate emails in the database. 
      if (empty($_POST["email"])) {
        $emailError = "Email is required";
      } else {
        $email = $_POST['email'];
        //Remove spaces from the content 
        //$email = trim($email); 
        require_once 'db.php';
        $conn = connectToDB();
        $query = mysqli_query($conn, "SELECT email from users where email = '$email'"); //Search for the email from the users database 
        $count = mysqli_num_rows($query); //get the number of rows that contain the email address. 
        echo $count;
        echo $email;
        if ($count > 0) { 
        //echo "Email already exists"; 
        //Action to take if email exists 
        $emailError = "Email already exists";
        } 
        //Email does not exist in the DB 
        //$email = $_POST['email'];
      }

      if (empty($_POST["name"])) {
        $nameError = "Name is required";
      } else {
        $name = $_POST['name'];
      }

      if (empty($_POST["password"])) {
        $passwordError = "Password is required";
      } else {
        $password = $_POST['password'];
      }

      if (empty($_POST["confirm_password"])) {
        $confirm_passwordError = "Confirm password is required";
      } else {
        $confirm_password = $_POST['confirm_password'];
      }

            //check if passwords match
            if ($password != $confirm_password && ($password != "" && $confirm_password != "")) {
              $passwordError = "Passwords do not match";
              $confirm_passwordError = "Passwords do not match";
            }

               //check if email already exists
              //TODO ook bij de if hieronder
              
              
               


       //check if  there are no errors     
      if ($emailError == "" && $nameError == "" && $passwordError == "" && $confirm_passwordError == "") {
        $valid = true;
         //write accountinfo to the users table
        //SQL INSERT
        require_once 'db.php';
        $conn = connectToDB();
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        registerNewUser($conn, $email, $name, $hashedPassword);
        mysqli_close($conn);
 

    }
  } 
     return [ 'valid' => $valid,  'name' => $name, 'email' => $email, 'password' => $password, 'confirm_password' => $confirm_password, 'passwordError' => $passwordError, 'confirm_passwordError' => $confirm_passwordError, 'nameError' => $nameError, 'emailError' => $emailError ];
}
  
function showRegisterStart() {
  echo "<h2>Register</h2>
  <p>Please enter your details to register.</p>
  <form action=\"index.php\" method=\"post\">
  <input name=\"page\" value=\"Register\" type=\"hidden\">";
}

function showRegisterField($fieldName, $label, $data) {
  echo "
  <div>
  <label for=\"$fieldName\">$label:</label>
  <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
  <span>* " . $data[$fieldName . "Error"]  . "</span>
  </div>";
}

function showRegisterEnd() {
  echo "<div>
  <input type=\"submit\" value=\"Send\">
  </div>
  </form>";
}

function showRegisterPage($data) {
  showRegisterStart();
  showRegisterField('name', 'Name', $data);
  showRegisterField('email', 'Email', $data);
  showRegisterField('password', 'Password', $data);
  showRegisterField('confirm_password', 'Confirm Password', $data);
  showRegisterEnd();
}
?>