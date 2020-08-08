<?php
// include Database connection file
 include 'visa_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_cusid = $_POST['up_cusid'];
    $up_vdate = $_POST['up_vdate'];
    $up_duration = $_POST['up_duration'];
    $up_country = $_POST['up_country'];
    $up_passno = $_POST['up_passno'];
    $up_issby = $_POST['up_issby'];
    $up_issdate = $_POST['up_issdate'];
    $up_passexdate = $_POST['up_passexdate'];
    $up_cprice = $_POST['up_cprice'];
      $up_sellprice = $_POST['up_sellprice'];
    $up_profit = $_POST['up_profit'];
    $up_desc = $_POST['up_desc'];
    $up_user_id = $_POST['up_user_id'];


    // Updaste Customer details
	updateRecord($up_id,$up_cusid,$up_vdate,$up_duration,$up_country,$up_passno,$up_issby,$up_issdate,$up_passexdate,$up_cprice,$up_sellprice,$up_profit,$up_desc,$up_user_id);
   
   echo "Successfully updated";

}
