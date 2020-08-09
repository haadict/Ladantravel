<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'visa_Class.php';
       // include 'function.php';
        // get values
        $cusid  = $_POST['cusid'];
        $vdate  = $_POST['vdate'];
        $duration  = $_POST['duration'];
        $country  = $_POST['country'];
        $passno  = $_POST['passno'];
        $issby  = $_POST['issby'];
        $issdate  = $_POST['issdate'];
        $passexdate = $_POST['passexdate'];
        $cprice = $_POST['cprice'];
        $sellprice  = $_POST['sellprice'];
        $profit  = $_POST['profit'];
        $desc = $_POST['desc'];
        $user_id = $_POST['user_id'];
        
        
          addRecord($cusid,$vdate,$duration,$country,$passno,$issby,$issdate,$passexdate,$cprice,$sellprice,$profit,$desc,$user_id);

        echo "New Record Added!";
    }

?>
