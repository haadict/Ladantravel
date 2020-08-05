<?php
// include Database connection file
 include 'branch_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_comid = $_POST['up_comid'];
    $up_bname = $_POST['up_bname'];
    $up_btell = $_POST['up_btell'];
    $up_baddr = $_POST['up_baddr'];
    $up_id = $_POST['up_id'];
    $up_user_id = $_POST['up_user_id'];
    

    // Updaste Customer details
	updateRecord($up_id,$up_comid,$up_bname,$up_btell,$up_baddr,$up_user_id);
   
   echo "Successfully updated";

}
