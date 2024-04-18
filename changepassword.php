<?php

function validateChangePassword(){
    $currentPassword = $newPassword = $confirmNewPassword = "";
    $currentPasswordError = $newPasswordError = $confirmNewPasswordError = "";
    $valid = false;

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