<?php
// include Database connection file
  include 'airLine_Class.php';

// check request
if(isset($_POST) != "")
{
    // get User ID
    $aid = $_POST['aid'];

    // Get User Details
	 $result= getAirLineById($aid);
    

    $response = array();
    if($result->rowcount()>0){
      while($row=$result->fetch())
      {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
