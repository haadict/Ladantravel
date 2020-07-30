<?php
// include Database connection file
 include 'receipt_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_inv = $_POST['up_inv'];
    $up_amount = $_POST['up_amount'];
    $up_paid = $_POST['up_paid'];
    $up_blance = $_POST['up_blance'];
    $up_pm = $_POST['up_pm'];
    $up_recdate = $_POST['up_recdate'];

    // Updaste Customer details
	updateRecord($up_id,$up_inv,$up_amount,$up_paid,$up_blance,$up_pm,$up_recdate);
   
   echo "Successfully updated";

}
