<?php
// include Database connection file
 include 'suplier_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_sname = $_POST['up_sname'];
    $up_tell = $_POST['up_tell'];
    $up_addr = $_POST['up_addr'];
    $up_email = $_POST['up_email'];
    $up_user_id = $_POST['up_user_id'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_sname,$up_tell,$up_addr,$up_email,$up_user_id);
   
   echo "Successfully updated";

}
