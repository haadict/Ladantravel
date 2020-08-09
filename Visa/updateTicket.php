<?php
// include Database connection file
 include 'ticket_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    //$up_cusid = $_POST['up_cusid'];
    $up_rdate = $_POST['up_rdate'];
    $up_ticket = $_POST['up_ticket'];
    $up_airline = $_POST['up_airline'];
    $up_dfrom = $_POST['up_dfrom'];
    $up_dto = $_POST['up_dto'];
    $up_tcprice = $_POST['up_tcprice'];
    $up_sprice = $_POST['up_sprice'];
    $up_tprofit = $_POST['up_tprofit'];
      $up_tdesc = $_POST['up_tdesc'];
    // $up_profit = $_POST['up_profit'];
    // $up_desc = $_POST['up_desc'];
    $up_user_id = $_POST['up_user_id'];


    // Updaste Customer details
	updateRecord($up_id,$up_rdate,$up_ticket,$up_airline,$up_dfrom,$up_dto,$up_tcprice,$up_sprice,$up_tprofit,$up_tdesc,$up_user_id);
   
   echo "Successfully updated";

}
