<?php
// include Database connection file
 include 'airLine_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $aid = $_POST['aid'];
    $u_aname = $_POST['u_aname'];
    

    // Updaste Customer details
	updateAirLine($aid,$u_aname);
   
   echo "Successfully updated";

}
