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