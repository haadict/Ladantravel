<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'branch_Class.php';

        // get values
        $comid = $_POST['comid'];
        $bname = $_POST['bname'];
        $btell = $_POST['btell'];
        $baddr = $_POST['baddr'];
        $user_id = $_POST['user_id'];

        

		addRecord($comid,$bname,$btell,$baddr,$user_id);

        echo "New Record Added!";
    }
?>
