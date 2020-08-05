<?php
// include Database connection file
 include 'employee_Class.php';

// check request
if(isset($_POST))
{
    // get values
    $up_id = $_POST['up_id'];
    $up_empname = $_POST['up_empname'];
    $up_empgender = $_POST['up_empgender'];
    $up_emptell = $_POST['up_emptell'];
    $up_empadrr = $_POST['up_empadrr'];
    $up_empemail = $_POST['up_empemail'];
    $up_emptitle = $_POST['up_emptitle'];
    $up_empsalary = $_POST['up_empsalary'];
    $up_comid = $_POST['up_comid'];
    $up_branchid = $_POST['up_branchid'];


    // Updaste Customer details
	updateRecord($up_id,$up_empname,$up_empgender,$up_emptell,$up_empadrr,$up_empemail,$up_emptitle,$up_empsalary,$up_comid,$up_branchid);
   
   echo "Successfully updated";

}
