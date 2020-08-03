<?php
// include Database connection file
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
}
