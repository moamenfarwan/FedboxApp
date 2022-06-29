<?php
   if ($_SERVER["REQUEST_METHOD"]) {
       require "db.inc.php";

       function cleaninput($data){
           $data = trim($data);
           $data = stripcslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

       function getvalues($value){
           return $_POST["$value"];
       }

       $email = getvalues("email");
       $firstname = getvalues("firstname");
       $lastname = getvalues("lastname");
       $gender = getvalues("gender");
       $address = getvalues("address");
       $password = getvalues("password");

       if (empty($email) || empty($firstname) || empty($lastname) || empty($gender) || empty($address) || empty($password)) {
           header("Location: ../index.php?error=emptyfields");
       } else {
         $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
         $query =  "INSERT INTO users (email,firstname,lastname,gender,address,password) VALUES (?,?,?,?,?,?)";
         $stmt = $con -> prepare($query);
         $stmt -> bind_param("ssssss", $email,$firstname,$lastname,$gender,$address,$password_encrypted);
         header("Location: ../login.php?success=loggedin");
         $stmt -> execute();
         $stmt -> close();
         $con -> close();
        }
   } 
?>