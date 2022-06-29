<?php 
    function cleaninput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getvalues($value){
        return $_POST["$value"];
    }

    function addSupplier(){
      $sql = "INSERT INTO suppliers (suppliername,address,phone) VALUES (?,?,?)";
      return $sql;
    }

    function addMeal($con,$mealname,$mealprice,$mealdescription,$mealquantity,$supplierID,$image){
        $sql = "INSERT INTO meals (mealname,price,description,quantity,supplierID,image) VALUES (?,?,?,?,?,?)";
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("ssssss", $mealname,$mealprice,$mealdescription,$mealquantity,$supplierID,$image);
        return $stmt -> execute();
    }

    function viewSupplier($con){
        $sql = "SELECT * FROM suppliers";
        return $con -> query($sql);
    }
     
     function viewMeals($con){
        $sql = "SELECT * FROM meals";
        return $con -> query($sql);
    }
    function viewMealID($con, $mealid){
        $sql = "SELECT * FROM meals WHERE mealID = $mealid";
        return $con -> query($sql); 
    }
    function viewSupplierID($con, $supplierID){
        $sql = "SELECT * FROM suppliers WHERE supplierID = $supplierID";
        return $con -> query($sql);
    }
    function deleteMeal($con, $mealid){
        $sql = "DELETE FROM meals WHERE mealID = $mealid";
        return $con -> query($sql);
    }
    function updateMeal($con,$mealid,$mealname,$mealprice,$mealdescription,$mealquantity,$supplierID,$image){
        $sql = "UPDATE meals SET mealname = '$mealname', price = '$mealprice' ,description = '$mealdescription',quantity = '$mealquantity',supplierID = '$supplierID',image = '$image' WHERE mealID = $mealid";
        return $con -> query($sql);
    } 
    function viewOrders($con){
        $sql = "SELECT * FROM orders";
        return $con -> query($sql);
    }
    function viewUserOrder($con, $userid){
        $sql = "SELECT * FROM orders WHERE userID = $userid";
        return $con -> query($sql);
    }
    function viewUserID($con, $userid){
        $sql = "SELECT * FROM users WHERE userID = $userid";
        return $con -> query($sql);
    }
    function updateUser($con,$userid,$firstname,$lastname,$email,$gender,$country){
        $sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname' ,email = '$email',gender = '$gender',country = '$country' WHERE userID = $userid";
        return $con -> query($sql);
    }
    function viewOrderID($con, $orderid){
        $sql = "SELECT * FROM orders WHERE orderID = $orderid";
        return $con -> query($sql);
    }
    function updateOrder($con,$orderID){
        $sql = "UPDATE orders SET orderStatus = 'paid' WHERE orderID = $orderID";
        return $con -> query($sql);
    }
    function viewUnpaidOrders($con){
        $sql = "SELECT * FROM orders WHERE orderStatus = 'unpaid'";
        return $con -> query($sql);
    }
?>