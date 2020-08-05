<?php
// include Database connection file
<<<<<<< HEAD
  include 'branch_Class.php';

// check request
if(isset($_POST) != "")
{
=======
include 'user_Class.php';

// check request
if (isset($_POST) != "") {
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
    // get User ID
    $up_id = $_POST['up_id'];

    // Get User Details
<<<<<<< HEAD
	 $result= getRecordById($up_id);
    

    $response = array();
    if($result->rowcount()>0){
      while($row=$result->fetch())
      {
            $response = $row;
        }
    }
    else
    {
=======
    $result = getRecordById($up_id);


    $response = array();
    if ($result->rowcount() > 0) {
        while ($row = $result->fetch()) {
            $response = $row;
        }
    } else {
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
<<<<<<< HEAD
}
else
{
=======
} else {
>>>>>>> 334e8ac9642ed2d13b3a2007ddffbf77b5782684
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
