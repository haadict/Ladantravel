<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_packagetype where FinishDate is null");
 }
 
function addRecord($pack_type){
 $stmt= getCnx()->prepare("INSERT INTO tbl_packagetype(packageType,packageCreateDate)
       VALUES (:pack_type,now())");

       $stmt->bindParam(':pack_type', $pack_type);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_packagetype WHERE packageTypeId =$up_id");
  }
  
  function updateRecord($up_id,$up_pack_type)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_packagetype SET  packageType=:up_pack_type WHERE   packageTypeId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_pack_type', $up_pack_type);
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_packagetype SET  FinishDate=now() WHERE packageTypeId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>