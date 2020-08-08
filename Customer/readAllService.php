<?php
    include("customer_Class.php");
if(isset($_POST)){
    if($_POST['type']=='Visa'){
     $data ="";
     $id=$_POST['id'];
     $data .= '
             <table class="table table-hover margin bottom">
                <thead>
                <tr>
                    <th style="width: 1%" class="text-center">No.</th>
                    <th>Customer Name</th>
                        
                        <th>Duration</th>
                        <th>Country</th>
                    
                        
                        <th>Sell Price</th>
                        
                        <th>Visa Description</th>
                       <th>Visa Date</th>
                        <th>Visa Create Date</th>
                </tr>
                </thead>
                <tbody>
             ';
     $no=0;
         $result = getVisaRecords($id);
         while($row=$result->fetch()){
            $no++;
             $data .= '
            <tr>
            <td class="text-center">'.$no.'</td>
            <td>'.$row["CustomerName"].'</td>
                                        
                            <td>'.$row["duration"].'</td>
                            <td>'.$row["country"].'</td>
                            
                           
                            
                             
                            <td>'.$row["visaDescription"].'</td>
                            <td>'.$row["visaDate"].'</td>
                            <td><span class="label label-primary">'.$row["sellPrice"].'</td>
                            <td>'.$row["visaCreateDate"].'</td> 

        </tr>
             ';
         }
    $data .= '</tbody></table>';
    
    echo $data;

}
else if($_POST['type']=='Ticket'){
     $data ="";
     $id=$_POST['id'];
     $data .= '
             <table class="table table-hover margin bottom">
                <thead>
                <tr>
                    <th style="width: 1%" class="text-center">No.</th>
                    <th>ReservaionDate</th>
                        
                        <th>TicketNo</th>
                        <th>airLineId</th>
                    
                        
                        <th>DestanationFrom</th>
                        
                        <th>DestanationTo</th>
                       <th>SellPrice</th>
                        <th>ticketDescription</th>
                </tr>
                </thead>
                <tbody>
             ';
     $no=0;
         $result = getTicketRecords($id);
         while($row=$result->fetch()){
            $no++;
             $data .= '
            <tr>
            <td class="text-center">'.$no.'</td>
                            <td>'.$row["EmployeeName"].'</td> 
                           
                                        
                            <td>'.$row["TicketNo"].'</td>
                            <td>'.$row["airLineId"].'</td>
                            
                           
                            <td>'.$row["DestanationFrom"].'</td>
                             
                            <td>'.$row["DestanationTo"].'</td>
                            <td><span class="label label-primary">'.$row["SellPrice"].'</td>
                             <td>'.$row["ReservaionDate"].'</td>

        </tr>
             ';
         }
    $data .= '</tbody></table>';
    
    echo $data;

}

else if($_POST['type']=='Cargo'){
     $data ="";
     $id=$_POST['id'];
     $data .= '
             <table class="table table-hover margin bottom">
                <thead>
                <tr>
                    <th style="width: 1%" class="text-center">No.</th>
                    <th>Customer Name</th>
                        
                        <th>package Type</th>
                        <th>package Kg</th>
                  
                        <th>Destanation From</th>
                       <th>Destanation To</th>
                        <th>Reciver Name</th>
                        <th>Reciver Tell</th>
                         <th>Sell Price</th>
                        <th>Taking Date</th>
                </tr>
                </thead>
                <tbody>
             ';
     $no=0;
         $result = getCargoRecords($id);
         while($row=$result->fetch()){
            $no++;
             $data .= '
            <tr>
            <td class="text-center">'.$no.'</td>
            <td>'.$row["CustomerName"].'</td>
                                        
                            <td>'.$row["packageType"].'</td>
                            <td>'.$row["packageKg"].'</td>
                            
                            <td>'.$row["destanationFrom"].'</td>
                           
                            <td>'.$row["destanationTo"].'</td>
                             
                           
                            <td>'.$row["reciverName"].'</td>
                            <td>'.$row["reciverTell"].'</td>
                            <td><span class="label label-primary">'.$row["sellPrice"].'</td>
                             <td>'.$row["takingDate"].'</td>
        </tr>
             ';
         }
    $data .= '</tbody></table>';
    
    echo $data;

}
}
   
?>
