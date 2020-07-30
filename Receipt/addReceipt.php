<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'receipt_Class.php';

        // get values
        $inv = $_POST['inv'];
        $amount = $_POST['amount'];
        $paid = $_POST['paid'];
        $blance = $_POST['blance'];
        $recdate = $_POST['recdate'];
        $pm = $_POST['pm'];
        $user_id = $_POST['user_id'];


        

		addRecord($inv,$amount,$paid,$blance,$recdate,$pm);

        echo "New Record Added!";
    }
?>
