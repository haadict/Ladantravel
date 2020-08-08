<?php
    if(isset($_POST))
    {
        // include Database connection file
        include 'customer_Class.php';
       // include 'function.php';
        // get values
        $custid  = $_POST['custid'];
        $rdate  = $_POST['rdate'];
        $ticket  = $_POST['ticket'];
        $airline  = $_POST['airline'];
        $dfrom  = $_POST['dfrom'];
        $dto  = $_POST['dto'];
        $tcprice  = $_POST['tcprice'];
        $sprice = $_POST['sprice'];
        $tprofit = $_POST['tprofit'];
        $tdesc  = $_POST['tdesc'];
        
        $user_id = $_POST['user_id'];
      //  echo $cprice,$profit;
        
          addTicketRecord($custid,$rdate,$ticket,$airline,$dfrom,$dto,$tcprice,$sprice,$tprofit,$tdesc,$user_id);

     echo "New Record Added!";
    }

?>
