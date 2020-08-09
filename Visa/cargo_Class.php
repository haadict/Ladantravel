<?php
include '../connection/dbcon.php';
function getCargoRecords(){
  return getCnx()->query("SELECT * FROM tbl_cargo cr,tbl_customers c, tbl_employee em,tbl_packagetype p where cr.customerId=c.CustomerId and cr.cargoCreateBy=em.EmployeeId and cr.packageTypeId=p.packageTypeId  and cr.FinishDate is null");
 }
 
    function addCargoRecord($crcustid,$package,$pkg,$crcprice,$crsprice,$crprofit,$crdesfrom,$crdesto,$crairline,$tdate,$gdate,$rname,$rtell,$raddr,$crdesc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_cargo(CustomerId, packageTypeId, packageKg, costPrice, sellPrice, profit,destanationFrom,destanationTo,airLineId,takingDate,gettingDate,reciverName,reciverTell,reciverAddress,cargoDescription,cargoCreateBy,cargoCreateDate)
   VALUES(:crcustid,:package,:pkg,:crcprice,:crsprice,:crprofit,:crdesfrom,:crdesto,:crairline,:tdate,:gdate,:rname,:rtell,:raddr,:crdesc,:user_id,now())");

       $stmt->bindParam(':crcustid', $crcustid);
       $stmt->bindParam(':package', $package);
       $stmt->bindParam(':pkg', $pkg);
       $stmt->bindParam(':crcprice', $crcprice);
       $stmt->bindParam(':crsprice', $crsprice);
       $stmt->bindParam(':crprofit', $crprofit);
       $stmt->bindParam(':crdesfrom', $crdesfrom);
       $stmt->bindParam(':crdesto', $crdesto);
       $stmt->bindParam(':crairline', $crairline);
       $stmt->bindParam(':tdate', $tdate);
       $stmt->bindParam(':gdate', $gdate);
       $stmt->bindParam(':rname', $rname);
       $stmt->bindParam(':rtell', $rtell);
       $stmt->bindParam(':raddr', $raddr);
       $stmt->bindParam(':crdesc', $crdesc);
       $stmt->bindParam(':user_id', $user_id);
       
       
       
     
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_cargo WHERE CargoId=$up_id");
  }
  
function updateRecord($up_id,$up_crcustid,$up_package,$up_pkg,$up_crcprice,$up_crsprice,$up_crprofit,$up_crdesfrom,$up_crdesto,$up_crairline,$up_tdate,$up_gdate,$up_rname,$up_rtell,$up_raddr,$up_crdesc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_cargo SET CustomerId=:up_crcustid,packageTypeId=:up_package,packageKg=:up_pkg,costPrice=:up_crcprice,sellPrice=:up_crsprice,profit=:up_crprofit,destanationFrom=:up_crdesfrom,destanationTo=:up_crdesto,airLineId=:up_crairline,takingDate=:up_tdate,gettingDate=:up_gdate,reciverName=:up_rname,reciverTell=:up_rtell,reciverAddress=:up_raddr,cargoDescription=:up_crdesc,cargoCreateBy=:up_user_id WHERE CargoId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          //$stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_crcustid', $up_crcustid);
          $stmt->bindParam(':up_package', $up_package);
          $stmt->bindParam(':up_pkg', $up_pkg);
          $stmt->bindParam(':up_crcprice', $up_crcprice);
          $stmt->bindParam(':up_crsprice', $up_crsprice);
          $stmt->bindParam(':up_crprofit', $up_crprofit);
          $stmt->bindParam(':up_crdesfrom', $up_crdesfrom);
          $stmt->bindParam(':up_crdesto', $up_crdesto);
          $stmt->bindParam(':up_crairline', $up_crairline);
          $stmt->bindParam(':up_tdate', $up_tdate);
          $stmt->bindParam(':up_gdate', $up_gdate);
          $stmt->bindParam(':up_rname', $up_rname);
          $stmt->bindParam(':up_rtell', $up_rtell);
          $stmt->bindParam(':up_raddr', $up_raddr);
          $stmt->bindParam(':up_crdesc', $up_crdesc);
          
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }
      function deleteCargoRecord($cr_del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_cargo SET  FinishDate=now() WHERE CargoId = :cr_del_id");

          $stmt->bindParam(':cr_del_id', $cr_del_id);
          $stmt->execute();
      }
?>