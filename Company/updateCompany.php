<?php
// include Database connection file
 include 'company_Class.php';

// check request
if(isset($_POST))
{
    // get values
    
        
        $img = '';
        if($_FILES["up_logo"]["name"] != '')
        {
            $img = update_image();
        }else
        {
            $img= $_POST["himg"];
        }
    $up_id = $_POST['up_id'];
    $up_cname = $_POST['up_cname'];
    $up_tell = $_POST['up_tell'];
    $up_addr = $_POST['up_addr'];
    $up_email = $_POST['up_email'];
    $up_web = $_POST['up_web'];
    $up_user_id = $_POST['up_user_id'];

//echo $img;
    // Updaste Customer details
	updateRecord($up_id,$up_cname,$up_tell,$up_addr,$up_email,$up_web,$img,$up_user_id);
   
   echo "Successfully updated";


}
function update_image()
{
 if(isset($_FILES["up_logo"]))
 {
  $ext = explode('.', $_FILES['up_logo']['name']);
  $new_name = rand() . '.' . $ext[1];
  $destination = '../upload/' . $new_name;
  move_uploaded_file($_FILES['up_logo']['tmp_name'], $destination);
  return $new_name;
 }
}
?>