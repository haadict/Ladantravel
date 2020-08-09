<?php
// include Database connection file
 include 'cargo_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_crcustid = $_POST['up_crcustid'];
    $up_package = $_POST['up_package'];
    $up_pkg = $_POST['up_pkg'];
    $up_crcprice = $_POST['up_crcprice'];
    $up_crsprice = $_POST['up_crsprice'];
    $up_crprofit = $_POST['up_crprofit'];
    $up_crdesfrom = $_POST['up_crdesfrom'];
    $up_crdesto = $_POST['up_crdesto'];
      $up_crairline = $_POST['up_crairline'];
    $up_tdate = $_POST['up_tdate'];
    $up_gdate = $_POST['up_gdate'];
      $up_rname = $_POST['up_rname'];
      $up_rtell = $_POST['up_rtell'];
    $up_raddr = $_POST['up_raddr'];
    $up_crdesc = $_POST['up_crdesc'];
    $up_user_id = $_POST['up_user_id'];


    // Updaste Customer details
	updateRecord($up_id,$up_crcustid,$up_package,$up_pkg,$up_crcprice,$up_crsprice,$up_crprofit,$up_crdesfrom,$up_crdesto,$up_crairline,$up_tdate,$up_gdate,$up_rname,$up_rtell,$up_raddr,$up_crdesc,$up_user_id);
   echo "Successfully updated";

}
