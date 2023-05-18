<?php

if(isset($_GET['floors'])){
  $Floors = $_GET['floors'];
  header("Location: http://localhost/Utopia/buyingpage/buyingpage_index.php?{$Floors}");
}
?>
