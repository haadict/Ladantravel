<?php
// include Database connection file
 include 'company_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_cname = $_POST['up_cname'];
    $up_tell = $_POST['up_tell'];
    $up_addr = $_POST['up_addr'];
    $up_email = $_POST['up_email'];
    $up_web = $_POST['up_web'];
    $up_user_id = $_POST['up_user_id'];


    // Updaste Customer details
	updateRecord($up_id,$up_cname,$up_tell,$up_addr,$up_email,$up_web,$up_user_id);
   
   echo "Successfully updated";

}
