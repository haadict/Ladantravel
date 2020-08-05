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
<<<<<<< HEAD
        //$logo  = $_FILES["logo"]["name"];
         $user_id = $_POST['user_id'];
        
        // $img = '';
        // if($_FILES["logo"]["name"] != '')
        // {
        //     $img = upload_image();
        // }
        
        
	addRecord($cname,$tell,$addr,$email,$web,$user_id);
=======
         $user_id = $_POST['user_id'];
		 $image = '';
		 if($_FILES["user_image"]["name"] != '')
		  {
		   $image = upload_image();
		  }
        
	addRecord($cname,$tell,$addr,$email,$web,$image,$user_id);
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684

       echo "New Record Added!";
    }
<<<<<<< HEAD

=======
function upload_image()
{
 if(isset($_FILES["user_image"]))
 {
  $extension = explode('.', $_FILES['user_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/' . $new_name;
  move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
  return $new_name;
 }
}
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
?>
