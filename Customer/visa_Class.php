<?php
include '../connection/dbcon.php';
function getRecords(){
  return getCnx()->query("SELECT * FROM tbl_visareservation v,tbl_customers c, tbl_employee em where v.customerId=c.CustomerId and v.visaCreateBy=em.EmployeeId and v.FinishDate is null");
 }
 
function addVisaRecord($cusid,$vdate,$duration,$country,$passno,$issby,$issdate,$passexdate,$cprice,$sellprice,$profit,$desc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_visareservation(customerId, visaDate, duration, country, passportNo, issuedBy,issuDate,passportExpireDate,costprice,sellPrice,profit,visaDescription,visaCreateBy,visaCreateDate)
   VALUES (:cusid,:vdate,:duration,:country,:passno,:issby,:issdate,:passexdate,:cprice,:sellprice,:profit,:desc,:user_id,now())");

       $stmt->bindParam(':cusid', $cusid);
       $stmt->bindParam(':vdate', $vdate);
       $stmt->bindParam(':duration', $duration);
       $stmt->bindParam(':country', $country);
       $stmt->bindParam(':passno', $passno);
       $stmt->bindParam(':issby', $issby);
       $stmt->bindParam(':issdate', $issdate);
       $stmt->bindParam(':passexdate', $passexdate);
       $stmt->bindParam(':cprice', $cprice);
       $stmt->bindParam(':sellprice', $sellprice);
       $stmt->bindParam(':profit', $profit);
       $stmt->bindParam(':desc', $desc);
       $stmt->bindParam(':user_id', $user_id);
       
	   
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_visareservation WHERE visaId=$up_id");
  }
  
function updateRecord($up_id,$up_cusid,$up_vdate,$up_duration,$up_country,$up_passno,$up_issby,$up_issdate,$up_passexdate,$up_cprice,$up_sellprice,$up_profit,$up_desc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET customerId=:up_cusid,visaDate=:up_vdate,duration=:up_duration,country=:up_country,passportNo=:up_passno,issuedBy=:up_issby,issuDate=:up_issdate,passportExpireDate=:up_passexdate,costprice=:up_cprice,sellPrice=:up_sellprice,profit=:up_profit,visaDescription=:up_desc,visaCreateBy=:up_user_id WHERE visaId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          $stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_vdate', $up_vdate);
          $stmt->bindParam(':up_duration', $up_duration);
          $stmt->bindParam(':up_country', $up_country);
          $stmt->bindParam(':up_passno', $up_passno);
          $stmt->bindParam(':up_issby', $up_issby);
          $stmt->bindParam(':up_issdate', $up_issdate);
          $stmt->bindParam(':up_passexdate', $up_passexdate);
          $stmt->bindParam(':up_cprice', $up_cprice);
          $stmt->bindParam(':up_sellprice', $up_sellprice);
          $stmt->bindParam(':up_profit', $up_profit);
          $stmt->bindParam(':up_desc', $up_desc);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }
      function deleteRecord($del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_visareservation SET  FinishDate=now() WHERE visaId = :del_id");

          $stmt->bindParam(':del_id', $del_id);
          $stmt->execute();
      }
?>