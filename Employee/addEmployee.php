<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'employee_Class.php';
        include 'function.php';
        // get values
        $empname  = $_POST['empname'];
        $empgender  = $_POST['empgender'];
        $emptell  = $_POST['emptell'];
        $empadrr  = $_POST['empadrr'];
        $empemail  = $_POST['empemail'];
        $emptitle  = $_POST['emptitle'];
        $empsalary  = $_POST['empsalary'];
        $comid = $_POST['comid'];
        $branchid = $_POST['branchid'];
        
        
         addRecord($empname,$empgender,$emptell,$empadrr,$empemail,$emptitle,$empsalary,$comid,$branchid);

        echo "New Record Added!";
    }

?>
