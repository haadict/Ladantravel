<?php
if (isset($_POST)) {
    // include Database connection file
    include 'user_Class.php';

    // get values
    $EmployeeId = $_POST['EmployeeId'];
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userType = $_POST['userType'];
    $createBy = $_POST['createBy'];



    addRecord($EmployeeId, $userName, $userPassword, $userType, $createBy);

    echo "New Record Added!";
}
