<?php
include '../connection/dbcon.php';
function getAirLine(){
  return getCnx()->query("SELECT * FROM tbl_airline where FinishDate is null");
 }
 
function addCustomer($aname){
 $stmt= getCnx()->prepare("INSERT INTO tbl_airline(airLineName,airLineCreatedDate)
       VALUES (:aname,now())");

       $stmt->bindParam(':aname', $aname);
       
	   
       $stmt->execute();
}

function getAirLineById($aid){
   return getCnx()->query("SELECT * FROM tbl_airline WHERE airLineId =$aid");
  }
  
  function updateAirLine($aid,$u_aname)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_airline SET  airLineName=:u_aname WHERE   airLineId = :id");

          $stmt->bindParam(':id', $aid);
          $stmt->bindParam(':u_aname', $u_aname);
          
          $stmt->execute();
      }
      function deleteAirLine($aid)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_airline SET  FinishDate=now() WHERE airLineId = :id");

          $stmt->bindParam(':id', $aid);
          $stmt->execute();
      }
?>