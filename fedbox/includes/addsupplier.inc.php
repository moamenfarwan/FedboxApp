<?php 
require_once 'db.inc.php';
require_once 'resources.php';


$suppliername= (getvalues("suppliername"));
$address= cleaninput(getvalues("address"));
$phone= cleaninput(getvalues("phone"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($suppliername) || empty($address) || empty($phone) ) {
        # code...
        header("Location: ../addsupplier.php?error=emptyfields");
    } else {
        $query = "INSERT INTO suppliers (suppliername,address,phone) VALUES (?,?,?)";
        $stmt = $con -> prepare($query);
        $stmt -> bind_param("sss", $suppliername, $address,$phone);
        header("Location: ../home.php?success=addedsupplier");
        $stmt -> execute();
        $stmt -> close();
        $con -> close();
    }
}
?>