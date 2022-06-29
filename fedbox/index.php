<?php 

require_once 'includes/header.php'; 

if(isset($_SESSION["isloggedin"])) {
   header("Location: home.php");
} else {
   header("Location: home.php");
}


?>