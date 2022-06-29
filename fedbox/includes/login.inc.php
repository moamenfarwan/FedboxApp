<?php

    if(isset($_POST['submit'])){

        require 'db.inc.php';
        $email= $_POST['email'];
        $password= $_POST['password'];

        if(empty($email) || empty($password)){
            header("Location: ../login.php?error=emptyfields");
            exit();
        }else{
            $sql= "SELECT * FROM users WHERE email= ?";
            $stmt= $con->prepare($sql);
            if(!$stmt){
                header("Location: ../login.php?error=sqlerror");
                exit();
            }else{
               $stmt->bind_param('s', $email);
               $stmt->execute();
               $result= $stmt->get_result();
               $row= $result->fetch_assoc();
                if($row){
                    $passCheck= password_verify($password, $row["password"]);
                    if($passCheck == false){
                        header("Location: ../login.php?error=wrongpass");
                         exit();
                    } elseif($passCheck ==  true){
                        session_start();
                        $isloggedin = true;
                        $_SESSION["isloggedin"]= $isloggedin;
                        $_SESSION["sessionId"]= $row["userID"];
                        $_SESSION["user"]= $row["email"];
                        $_SESSION["role"]= $row["role"];
                        header("Location: ../store.php?success=loggedin");
                        exit();
                        
                    }else{
                        header("Location: ../login.php?error=nouserwithemail$email".$email);
                        exit();
                    }
                    
                }else{
                    header("Location: ../login.php?error=nouser");
                     exit();
                }
            }
        

        }
    }else{
        header("Location: ../home.php?error=accessforbidden");
        exit();
    }


?>