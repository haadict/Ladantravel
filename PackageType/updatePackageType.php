<?php
// include Database connection file
 include 'packageType_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_pack_type = $_POST['up_pack_type'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_pack_type);
   
   echo "Successfully updated";

}
