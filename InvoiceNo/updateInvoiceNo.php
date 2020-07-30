<?php
// include Database connection file
 include 'invoiceNo_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_pref = $_POST['up_pref'];
    $up_inv_no = $_POST['up_inv_no'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_inv_no,$up_pref);
   
   echo "Successfully updated";

}
