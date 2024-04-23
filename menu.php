 <?php 
//print every menu label
function showMenuItem($link, $label) { 
  echo '<li><a href=\index.php?page='. $link .'>' . $label . '</a></li>' . PHP_EOL; 
} 

function showMenu($data) {  
  echo '<nav> 
  <ul class="menu">'; 
  foreach($data['menu'] as $link => $label) { 
    showMenuItem($link, $label); 
  }
  //temporary solution to get username in menu bar
  if (isset($_SESSION['username'])) {
  echo "welcome back " . $_SESSION['username'];
  }
  echo '</ul>' . PHP_EOL . '         </nav>' . PHP_EOL;  

}
?>


