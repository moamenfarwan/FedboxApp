<?php 
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';


$mealid= getvalues("mealid");
$quantity= getvalues("quantity");
$userid = getvalues("userid");
$query = viewMealID($con, $mealid);
$a = $query -> fetch_array();
$mealprice = $a["price"];

if ($mealprice * $quantity > 1000) {
    $ordertotal = $mealprice * $quantity * 0.9;
    $orderDiscount = "true";
} else {
    $ordertotal = $mealprice * $quantity;
    $orderDiscount = "false";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($mealid) || empty($quantity) || empty($userid) ) {
        # code...
        header("Location: store.php?error=emptyfields");
    } else {
        $query = "INSERT INTO orders (mealID,quantity,orderTotal,userID,orderDiscount) VALUES (?,?,?,?,?)";
        $stmt = $con -> prepare($query);
        $stmt -> bind_param("sssss", $mealid,$quantity,$ordertotal,$userid,$orderDiscount);
        header("Location: myaccount.php?success=orderadded");
        $stmt -> execute();
        $stmt -> close();
        $con -> close();

    }
}
?>