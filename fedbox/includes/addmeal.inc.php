<?php 
require_once 'db.inc.php';
require_once 'resources.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mealname= (getvalues("mealname"));
    $mealprice= cleaninput(getvalues("mealprice"));
    $mealdescription= cleaninput(getvalues("mealdescription"));
    $mealquantity= cleaninput(getvalues("mealquantity"));
    $supplierID= cleaninput(getvalues("supplierID"));
    $image= (getvalues("image"));

    if (empty($mealname) || empty($mealprice) || empty($mealdescription) || empty($mealquantity) || empty($supplierID) || empty($image)) {
        # code...
        header("Location: ../addmeal.php?error=emptyfields");
    } else {
        $addmeal = addMeal($con,$mealname,$mealprice,$mealdescription,$mealquantity,$supplierID,$image);
        ($addmeal  == 1 ) ? header("Location: ../addmeal.php?success=mealadded") : header("Location: ../addmeal.php?error=failed");
    }
}
?>