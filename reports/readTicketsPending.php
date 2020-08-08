<?php
 include("reportClass.php");
if(empty($_POST["startDate"])){
   
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Ticket Number</th>
					<th>Customer Name</th>
					<th>Destination From</th>
					<th>Destination To</th>
					<th>Cost</th>
					<th>Airline</th>
					<th>Reservation Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getTicketsPendingList();
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["TicketNo"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["DestanationFrom"].'</td>
			<td>'.$row["DestanationTo"].'</td>
			<td><span class="label label-primary">'.$row["SellPrice"].'</span></td>	
			<td>'.$row["airLineName"].'</td>
			<td>'.$row["ReservaionDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
	else if(isset($_POST["startDate"])){
		
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Ticket Number</th>
					<th>Customer Name</th>
					<th>Destination From</th>
					<th>Destination To</th>
					<th>Cost</th>
					<th>Airline</th>
					<th>Reservation Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getTicketsPendingListByDate($_POST["startDate"],$_POST["endDate"]);
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["TicketNo"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["DestanationFrom"].'</td>
			<td>'.$row["DestanationTo"].'</td>
			<td><span class="label label-primary">$ '.$row["SellPrice"].'</span></td>	
			<td>'.$row["airLineName"].'</td>
			<td>'.$row["ReservaionDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
   
?>
