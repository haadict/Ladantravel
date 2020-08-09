<?php
include '../connection/dbcon.php';
function getTicketRecords(){
  return getCnx()->query("SELECT * FROM tbl_ticketreservation t,tbl_customers c, tbl_employee em,tbl_airline ar where t.customerId=c.CustomerId and t.ticketCreateBy=em.EmployeeId and t.airLineId=ar.airLineId and t.FinishDate is null ");
 }
 
 function addRecord($custid,$rdate,$ticket,$airline,$dfrom,$dto,$tcprice,$sprice,$tprofit,$tdesc,$user_id)
{
 $stmt= getCnx()->prepare("INSERT INTO tbl_ticketreservation(CustomerId,ReservaionDate, TicketNo, airLineId, DestanationFrom, DestanationTo,CostPrice,SellPrice,Profit,ticketDescription,ticketCreateBy,ticketCreateDate)
   VALUES(:custid,:rdate,:ticket,:airline,:dfrom,:dto,:tcprice,:sprice,:tprofit,:tdesc,:user_id,now())");

       $stmt->bindParam(':custid', $custid);
       $stmt->bindParam(':rdate', $rdate);
       $stmt->bindParam(':ticket', $ticket);
       $stmt->bindParam(':airline', $airline);
       $stmt->bindParam(':dfrom', $dfrom);
       $stmt->bindParam(':dto', $dto);
       $stmt->bindParam(':tcprice', $tcprice);
       $stmt->bindParam(':sprice', $sprice);
       $stmt->bindParam(':tprofit', $tprofit);
       $stmt->bindParam(':tdesc', $tdesc);
       $stmt->bindParam(':user_id', $user_id);
       
       
       
     
       $stmt->execute();
}

function getRecordById($up_id){
   return getCnx()->query("SELECT * FROM tbl_ticketreservation WHERE ticketId=$up_id");
  }
  
function updateRecord($up_id,$up_rdate,$up_ticket,$up_airline,$up_dfrom,$up_dto,$up_tcprice,$up_sprice,$up_tprofit,$up_tdesc,$up_user_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_ticketreservation SET ReservaionDate=:up_rdate,TicketNo=:up_ticket,airLineId=:up_airline,DestanationFrom=:up_dfrom,DestanationTo=:up_dto,CostPrice=:up_tcprice,SellPrice=:up_sprice,Profit=:up_tprofit,ticketDescription=:up_tdesc,ticketCreateBy=:up_user_id WHERE ticketId = :up_id");

          $stmt->bindParam(':up_id', $up_id);
          //$stmt->bindParam(':up_cusid', $up_cusid);
          $stmt->bindParam(':up_rdate', $up_rdate);
          $stmt->bindParam(':up_ticket', $up_ticket);
          $stmt->bindParam(':up_airline', $up_airline);
          $stmt->bindParam(':up_dfrom', $up_dfrom);
          $stmt->bindParam(':up_dto', $up_dto);
          $stmt->bindParam(':up_tcprice', $up_tcprice);
          $stmt->bindParam(':up_sprice', $up_sprice);
          $stmt->bindParam(':up_tprofit', $up_tprofit);
          $stmt->bindParam(':up_tdesc', $up_tdesc);
          // $stmt->bindParam(':up_profit', $up_profit);
          // $stmt->bindParam(':up_desc', $up_desc);
          $stmt->bindParam(':up_user_id', $up_user_id);
          
          
          $stmt->execute();
      }
      function deleteTicketRecord($t_del_id)
      {
        $stmt =getCnx()->prepare("UPDATE tbl_ticketreservation SET  FinishDate=now() WHERE ticketId = :t_del_id");

          $stmt->bindParam(':t_del_id', $t_del_id);
          $stmt->execute();
      }
?>