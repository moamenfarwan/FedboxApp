<?php 
require_once 'db.inc.php';
require_once 'resources.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mealid= getvalues("mealid");
    $mealname= getvalues("mealname");
    $mealprice= cleaninput(getvalues("mealprice"));
    $mealdescription= cleaninput(getvalues("mealdescription"));
    $mealquantity= cleaninput(getvalues("mealquantity"));
    $supplierID= cleaninput(getvalues("supplierID"));
    $image= getvalues("image");

    if (empty($mealname) || empty($mealprice) || empty($mealdescription) || empty($mealquantity) || empty($supplierID) || empty($image) || empty($mealid)) {
        # code...
        header("Location: ../editmeal.php?error=emptyfields");
    } else {
        $updatemeal = updateMeal($con,$mealid,$mealname,$mealprice,$mealdescription,$mealquantity,$supplierID,$image);
        ($updatemeal  == 1 ) ? header("Location: ../editmeal.php?mealid=$mealid&success=mealupdated") : header("Location: ../editmeal.php?mealid=$mealid&error=failed");
    }
}
?>