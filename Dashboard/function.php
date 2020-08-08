<?php 
include '../connection/dbcon.php';
  function empTotal()
  {
      $stmt=getCnx()->prepare("SELECT COUNT(em.EmployeeId) as total FROM tbl_employee em WHERE em.FinishDate is null");
        $stmt->execute();
         while ($row = $stmt->fetch()){
        if (!empty($row['total'])){
          return $row['total'];
        }
        else{
            return 0;
        }
      }
 }
  function custTotal()
  {
      $stmt=getCnx()->prepare("SELECT COUNT(c.CustomerId) AS total FROM tbl_customers c WHERE c.FinishDate is null");
        $stmt->execute();
         while ($row = $stmt->fetch()){
        if (!empty($row['total'])){
          return $row['total'];
        }
        else{
            return 0;
        }
      }
 }
 function visaTotal()
  {
      $stmt=getCnx()->prepare("SELECT ifnull(COUNT(v.visaId),0) as total FROM tbl_visareservation v WHERE v.FinishDate is null");
        $stmt->execute();
         while ($row = $stmt->fetch()){
        if (!empty($row['total'])){
          return $row['total'];
        }
        else{
            return 0;
        }
      }
 }
 function ticketsTotal()
  {
      $stmt=getCnx()->prepare("SELECT ifnull(COUNT(t.ticketId),0) as total FROM tbl_ticketreservation t WHERE t.FinishDate is null");
        $stmt->execute();
         while ($row = $stmt->fetch()){
        if (!empty($row['total'])){
          return $row['total'];
        }
        else{
            return 0;
        }
      }
 }
 function cargoTotal()
  {
      $stmt=getCnx()->prepare("SELECT ifnull(COUNT(c.CargoId),0) as total FROM tbl_cargo c WHERE c.FinishDate is null");
        $stmt->execute();
         while ($row = $stmt->fetch()){
        if (!empty($row['total'])){
          return $row['total'];
        }
        else{
            return 0;
        }
      }
 }
 ?>