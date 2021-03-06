<?php
include '../connection/dbcon.php';
function getTickets(){
  return getCnx()->query("SELECT count(ticketId) as Tickets FROM tbl_ticketreservation where FinishDate is null");
 }
 function getVisas(){
  return getCnx()->query("SELECT count(visaId) as Visas FROM tbl_visareservation where FinishDate is null");
 }
  function getCargos(){
  return getCnx()->query("SELECT count(CargoId) as Cargos FROM tbl_cargo where FinishDate is null");
 }
 function getTicketsByDate($startDate,$endDate){
  return getCnx()->query("SELECT count(ticketId) as Tickets FROM tbl_ticketreservation where ticketCreateDate between '$startDate' and '$endDate' and FinishDate is null");
 }
 function getVisasByDate($startDate,$endDate){
  return getCnx()->query("SELECT count(visaId) as Visas FROM tbl_visareservation where visaCreateDate between '$startDate' and '$endDate' and FinishDate is null");
 }
 function getCargosByDate($startDate,$endDate){
  return getCnx()->query("SELECT count(CargoId) as Cargos FROM tbl_cargo where cargoCreateDate between '$startDate' and '$endDate' and FinishDate is null");
 }
 function getTicketsList(){
  return getCnx()->query("SELECT * FROM tbl_ticketreservation t INNER JOIN tbl_airline a ON t.airLineId=a.airLineId
INNER JOIN tbl_customers c ON C.CustomerId=T.CustomerId
where t.FinishDate is null");
 }
  function getTicketsTableByDate($startDate,$endDate){
  return getCnx()->query("SELECT * FROM tbl_ticketreservation t INNER JOIN tbl_airline a ON t.airLineId=a.airLineId
INNER JOIN tbl_customers c ON C.CustomerId=T.CustomerId
where t.ticketCreateDate between '$startDate' and '$endDate' and t.FinishDate is null");
 }
  function getTicketsListByDate($startDate,$endDate){
  return getCnx()->query("SELECT count(ticketId) as Tickets FROM tbl_ticketreservation where ticketCreateDate between '$startDate' and '$endDate' and FinishDate is null");
 }
  function getVisasList(){
  return getCnx()->query("SELECT * FROM tbl_visareservation v INNER JOIN tbl_customers c ON C.CustomerId=v.customerId where v.FinishDate is null");
 }
  function getCargoList(){
  return getCnx()->query("SELECT * FROM tbl_cargo cr INNER JOIN tbl_customers c ON C.CustomerId=cr.CustomerId
INNER JOIN tbl_packagetype p ON p.packageTypeId=cr.packageTypeId
where cr.FinishDate is null");
 }
 function getVisasTableByDate($startDate,$endDate){
  return getCnx()->query("SELECT * FROM tbl_visareservation v INNER JOIN tbl_customers c ON C.CustomerId=v.customerId 
  where v.visaCreateDate between '$startDate' and '$endDate' AND v.FinishDate is null");
 }
 function getCargoTableByDate($startDate,$endDate){
  return getCnx()->query("SELECT * FROM tbl_cargo cr INNER JOIN tbl_customers c ON C.CustomerId=cr.CustomerId
INNER JOIN tbl_packagetype p ON p.packageTypeId=cr.packageTypeId
where cr.cargoCreateDate between '$startDate' and '$endDate' and cr.FinishDate is null");
 }
 ?>