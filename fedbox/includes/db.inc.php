<?php 
  $server = "localhost";
  $user = "root";
  $password = "";
  $databasename = "fedbox";

  $con = new mysqli($server, $user, $password, $databasename);
  if ($con -> connect_error) {
      die("Connection Error");
  }

?>