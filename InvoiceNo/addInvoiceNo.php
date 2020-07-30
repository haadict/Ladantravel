<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'invoiceNo_Class.php';

        // get values
        $pref = $_POST['pref'];
        $inv_no = $_POST['inv_no'];
        

		addRecord($inv_no,$pref);

        echo "1 Record Added!";
    }
?>
