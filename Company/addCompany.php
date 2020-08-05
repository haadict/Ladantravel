<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'company_Class.php';
        include 'function.php';
        // get values
        $cname  = $_POST['cname'];
        $tell  = $_POST['tell'];
        $addr  = $_POST['addr'];
        $email  = $_POST['email'];
        $web  = $_POST['web'];
        //$logo  = $_FILES["logo"]["name"];
         $user_id = $_POST['user_id'];
        
        // $img = '';
        // if($_FILES["logo"]["name"] != '')
        // {
        //     $img = upload_image();
        // }
        
        
	addRecord($cname,$tell,$addr,$email,$web,$user_id);

       echo "New Record Added!";
    }

?>
