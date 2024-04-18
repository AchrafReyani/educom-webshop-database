<?php

function validateChangePassword(){
    $currentPassword = $newPassword = $confirmNewPassword = "";
    $currentPasswordError = $newPasswordError = $confirmNewPasswordError = "";
    $valid = false;

    
    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
        //print error messages for empty fields
        if (empty($_POST["currentPassword"])) {
          $currentPasswordError = "Current password is required";
        } else {
          $currentPassword = $_POST['currentPassword'];
        }

        if (empty($_POST["newPassword"])) {
            $newPasswordError = "New password is required";
          } else {
            $newPassword = $_POST['newPassword'];
          }

        if (empty($_POST["confirmNewPassword"])) {
          $confirmNewPasswordError = "Confirm new password is required";
        } else {
          $confirmNewPassword = $_POST['confirmNewPassword'];
        }

        //check if passwords match
        if ($newPassword != $confirmNewPassword && ($newPassword != "" && $confirmNewPassword != "")) {
            $newPasswordError = "New passwords do not match";
            $confirmNewPasswordError = "New passwords do not match";
          }

          //check if current password is not the same as new password
          if ($currentPassword == $newPassword) {
            $newPasswordError = "New password cannot be the same as current password";
          }

        //make db connection
        //get current user's password
        //check if password is correct
        //hash new password
        //insert new password into database
        //
        
    

    }

    return [ 'valid' => $valid, 'currentPassword' => $currentPassword, 'newPassword' => $newPassword, 'confirmNewPassword' => $confirmNewPassword,  'currentPasswordError' => $currentPasswordError, 'newPasswordError' => $newPasswordError, 'confirmNewPasswordError' => $confirmNewPasswordError];

}

function showChangePasswordStart() {
    echo "<h2>Change Password</h2>
    <p>Please enter your old password and your new password twice.</p>
    <form action=\"index.php\" method=\"post\">
    <input name=\"page\" value=\"ChangePassword\" type=\"hidden\">";
  }
  
  function showChangePasswordEnd($data) {
     echo "<div>
     <input type=\"submit\" value=\"Send\">
     </div>
   </form>";
  }
  
  function showChangePasswordField($fieldName, $label, $data) {
  
     echo "
     <div>
     <label for=\"$fieldName\">$label:</label>
     <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
     <span>* " . $data[$fieldName . "Error"]  . "</span>
     </div>";
  
   }

    function showChangePasswordPage($data){

      showChangePasswordStart();
      showChangePasswordField("currentPassword", "Current password", $data);
      showChangePasswordField("newPassword", "New password", $data);
      showChangePasswordField("confirmNewPassword", "Confirm new password", $data);
      showChangePasswordEnd($data);
        
    }
?>