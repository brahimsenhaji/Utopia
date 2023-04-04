<?php 
if(isset($_GET['Log_out'])){
  session_start();
  session_unset();
  session_destroy();

  
  header("Location: ../index.php?error=none");
}
 
if(isset($_GET['settings'])){
  header("Location: ../UserPage/userpage_index.php?profile=");
}