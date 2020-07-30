<?php
// include Database connection file
 include 'expense_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_expid = $_POST['up_expid'];
    $up_expdes = $_POST['up_expdes'];
    $up_expamount = $_POST['up_expamount'];
    $up_expdate = $_POST['up_expdate'];
    $up_user_id = $_POST['up_user_id'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_expid,$up_expdes,$up_expamount,$up_expdate,$up_user_id);
   
   echo "Successfully updated";

}
