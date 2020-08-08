<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'customer_Class.php';
       // include 'function.php';
        // get values
        $package  = $_POST['package'];
        $pkg  = $_POST['pkg'];
        $crcprice  = $_POST['crcprice'];
        $crsprice  = $_POST['crsprice'];
        $crprofit  = $_POST['crprofit'];
        $crdesfrom  = $_POST['crdesfrom'];
        $crdesto  = $_POST['crdesto'];
        $crairline = $_POST['crairline'];
        $tdate = $_POST['tdate'];
        $gdate  = $_POST['gdate'];
        $rname  = $_POST['rname'];
        $rtell = $_POST['rtell'];
        $raddr = $_POST['raddr'];
        $crdesc = $_POST['crdesc'];
        $crcustid = $_POST['crcustid'];
        $user_id = $_POST['user_id'];
        
        
          addCargoRecord($crcustid,$package,$pkg,$crcprice,$crsprice,$crprofit,$crdesfrom,$crdesto,$crairline,$tdate,$gdate,$rname,$rtell,$raddr,$crdesc,$user_id);

     echo "New Record Added!";
    }

?>
