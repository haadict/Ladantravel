<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'customer_Class.php';

        // get values
        $fullname = $_POST['fullname'];
        $tell = $_POST['tell'];
        $address = $_POST['address'];
		$email = $_POST['email'];
		$user_id = $_POST['user_id'];

		addCustomer($fullname,$tell,$address,$email,$user_id);

        echo "1 Record Added!";
    }
?>
