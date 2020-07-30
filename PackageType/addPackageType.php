<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'packageType_Class.php';

        // get values
        $pack_type = $_POST['pack_type'];
        

		addRecord($pack_type);

        echo "1 Record Added!";
    }
?>
