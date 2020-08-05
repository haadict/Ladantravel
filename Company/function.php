<?php 
function upload_image()
{
 if(isset($_FILES["logo"]))
 {
  $logo = explode('.', $_FILES['logo']['name']);
  $new_name = rand() . '.' . $ext[1];
  $destination = './images/' . $new_name;
  move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
  return $new_name;
 }
}
// function update_image()
// {
//  if(isset($_FILES["eimg"]))
//  {
//   $ext = explode('.', $_FILES['eimg']['name']);
//   $new_name = rand() . '.' . $ext[1];
//   $destination = './upload/' . $new_name;
//   move_uploaded_file($_FILES['eimg']['tmp_name'], $destination);
//   return $new_name;
//  }
// }

?>