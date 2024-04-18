<?php

//mandatory includes for all pages
include "sessionManager.php";
include 'header.php';
include 'menu.php';
include 'footer.php';
include 'beginDocument.php';
include 'endDocument.php';
//include 'db.php';

session_start(); //start session

//functions
function showContent($data){
	switch($data['page'])
	{
		case 'Home';
      include 'home.php';
		  showHomePage();
		  break;
		case 'About';
      include 'about.php';
		  showAboutPage();
		  break;
		case 'Contact';
		  showContactPage($data);
      break;
    case 'Thankyou';
      include 'thankyou.php';
      showThankYouPage($data);
      break;
    case 'Register';
		  showRegisterPage($data);
		  break;
		case 'Login';
		  showLoginPage($data);
		  break;
    case 'ChangePassword';
      showChangePasswordPage($data);
      break;
		default; 
		  showHomePage();
	}
}

function getRequestedPage() {
  $page = 'Home';

  // Check for page in POST data if request method is POST
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['page'])) {
  
      $page = $_POST['page'];
      // Check if the requested page is Contact and perform validation
       
    }
  
  } else {
    // Fallback to GET if no page found in POST
    if (!isset($_GET['page'])) {
      $page = 'Home';
    } else {
      $page = $_GET['page'];
    }
  }

  return $page;
}

function processRequest($page) {
  switch($page)
	{
		case 'Contact';
      include 'contact.php';
      $data = validateForm(); // Call the validation function from contact.php (assuming it's included)
      // Handle the validation result
      if ($data['valid']) {
        // Form is valid, show Thank You page (or perform further actions)
        $page = 'Thankyou';
      }
      break;
    case 'Register';
      include 'register.php';
      $data = validateRegistration();
      if ($data['valid']) {
        $page = 'Home';
        //set state to logged in?
        //write user to file
      }
      break;
    case 'Login';
      include 'login.php';
      $data = validateLogin();
      if ($data['valid']) {
        doLoginUser($data['username'], $data['email']);
        $page = 'Home';
        //set state to logged in
      }
      break;
    case 'Logout';
      doLogoutUser();
      $page = 'Home';
      break;
    case 'ChangePassword';
      include 'changePassword.php';
      $data = validateChangePassword();
      if ($data['valid']) {
        //logout the user and send them back to the home page
        doLogoutUser();
        $page = 'Home';
      }
      break;
      default;
      break;
    }
    $data['page'] = $page; //add value of current page to the data
    return $data;
}
function showResponsePage($data){
	beginDocument();
	showHeader();
	showMenu();
	showContent($data); //use the data received to fill in unifinished form with valid data
	showFooter();
	endDocument();
}

//start of application
$page = getRequestedPage();
$data = processRequest($page);
var_dump($data);//for testing
showResponsePage($data);

?>