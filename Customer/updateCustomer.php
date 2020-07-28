<?php
// include Database connection file
 include 'customer_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $tell = $_POST['tell'];
	$address = $_POST['address'];
    $email = $_POST['email'];

    // Updaste Customer details
	updateCustomer($id,$fullname,$tell,$address,$email);
   
   echo "Successfully updated";

}
