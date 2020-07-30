<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'expenseType_Class.php';

        // get values
        $exp_type = $_POST['exp_type'];
        

		addRecord($exp_type);

        echo "1 Record Added!";
    }
?>
