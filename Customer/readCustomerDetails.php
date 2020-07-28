<?php
// include Database connection file
  include 'customer_Class.php';

// check request
if(isset($_POST) != "")
{
    // get User ID
    $cust_id = $_POST['id'];

    // Get User Details
	 $result= getCustomerById($cust_id);
    

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
