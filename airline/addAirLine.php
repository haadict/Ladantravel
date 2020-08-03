<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'airLine_Class.php';

        // get values
        $aname = $_POST['aname'];
        

		addCustomer($aname);

        echo "1 Record Added!";
    }
?>
