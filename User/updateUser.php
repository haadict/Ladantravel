<?php
// include Database connection file
<<<<<<< HEAD
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

=======
include 'user_Class.php';

// check request
if (isset($_POST)) {
    // get values
    $up_employeeId = $_POST['up_employeeId'];
    $up_id = $_POST['up_id'];
    $up_userName = $_POST['up_userName'];
    $up_userPassword = $_POST['up_userPassword'];
    $up_userType = $_POST['up_userType'];
    $up_crateBy_id = $_POST['up_crateBy_id'];


    // Updaste Customer details
    updateRecord($up_employeeId, $up_id, $up_userName, $up_userPassword, $up_userType, $up_crateBy_id);

    echo "Successfully updated";
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
}
