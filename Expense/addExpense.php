<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'expense_Class.php';

        // get values
        $expid = $_POST['expid'];
        $expdes = $_POST['expdes'];
        $expamount = $_POST['expamount'];
        $expdate = $_POST['expdate'];
        $user_id = $_POST['user_id'];

        

		addRecord($expid,$expdes,$expamount,$expdate,$user_id);

        echo "New Record Added!";
    }
?>
