<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'suplier_Class.php';

        // get values
        $sname = $_POST['sname'];
        $tell = $_POST['tell'];
        $addr = $_POST['addr'];
        $email = $_POST['email'];
        $user_id = $_POST['user_id'];

        

		addRecord($sname,$tell,$addr,$email,$user_id);

        echo "New Record Added!";
    }
?>
