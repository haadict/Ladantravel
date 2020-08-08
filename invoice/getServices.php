<?php 
if(isset($_POST))
{
  require_once'function.php';
  $status = $_POST['status'];
  if($status=="RedQuatationDetails")
  {
  header("Content-Type: application/json; charset=UTF-8");

    $qutationId = $_POST['qutationId'];
    $servinfo=array();
      $result = RedQuatationDetails($qutationId);
        $servinfo= $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($servinfo);
  }
 if($status=="RedBarcode")
  {

  $barcodeId = $_POST['barcodeId'];
    $servinfo=array();
  $result = getQuatation($barcodeId);
   
  if($result->rowcount()>0) {
    while($row=$result->fetch()) {
      $servinfo = $row;
    }
  }
  else {
    $servinfo['status'] = 200;
    $servinfo['message'] = "data not found";
  }
   echo json_encode($servinfo);
}

}


 ?>