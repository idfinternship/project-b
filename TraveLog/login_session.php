<?php 
  session_start();
  $isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;
  if($isLoggedIn){
    $id = $_SESSION['userID'];
  }
 ?>