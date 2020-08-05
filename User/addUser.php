<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'user_Class.php';

        // get values
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        $userType = $_POST['userType'];
        $userEmployeeId = $_POST['userEmployeeId'];

        

		addRecord($userName,$userPassword,$userType,$userEmployeeId);

        echo "New Record Added!";
    }
?>
