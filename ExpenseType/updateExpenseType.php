<?php
// include Database connection file
 include 'expenseType_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_exp_type = $_POST['up_exp_type'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_exp_type);
   
   echo "Successfully updated";

}
