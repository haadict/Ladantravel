<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'company_Class.php';

        // get values
        $cname  = $_POST['cname'];
        $tell  = $_POST['tell'];
        $addr  = $_POST['addr'];
        $email  = $_POST['email'];
        $web  = $_POST['web'];
       // $logo  = $_POST['logo'];
         $user_id = $_POST['user_id'];
// $img = '';
//         if($_FILES["logo"]["name"] != '')
//         {
//             $img = upload_image();
//         }
        
         //alert($img);
	addRecord($cname,$tell,$addr,$email,$web,$img,$user_id);

        echo "New Record Added!";
    }
// function upload_image()
// {
//      if(isset($_FILES["logo"]))
//      {
//       $ext = explode('.', $_FILES['logo']['name']);
//       $new_name = rand() . '.' . $ext[1];
//       $destination = '../images/' . $new_name;
//       move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
//       return $new_name;
//      }
//  }
?>
