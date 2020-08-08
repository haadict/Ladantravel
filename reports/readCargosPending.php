<?php
    include("reportClass.php");
	if(empty($_POST["startDate"])){
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Package Type</th>
					<th>Package kg</th>
					<th>Customer Name</th>
					<th>Destination From</th>
					<th>Destination To</th>
					<th>Receiver Name</th>
					<th>Receiver Tell</th>
					<th>Cost</th>
					<th>Taking Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getCargoPending();
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["packageType"].'</td>
			<td>'.$row["packageKg"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["destanationFrom"].'</td>
			<td>'.$row["destanationTo"].'</td>
			<td>'.$row["reciverName"].'</td>
			<td>'.$row["reciverTell"].'</td>
			<td><span class="label label-primary">'.$row["sellPrice"].'</span></td>	
			<td>'.$row["takingDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	
    echo $data;
	}
	else if(isset($_POST) != ""){
		
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Package Type</th>
					<th>Package kg</th>
					<th>Customer Name</th>
					<th>Destination From</th>
					<th>Destination To</th>
					<th>Receiver Name</th>
					<th>Receiver Tell</th>
					<th>Cost</th>
					<th>Taking Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result =getCargoPendingByDate($_POST["startDate"],$_POST["endDate"]);
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["packageType"].'</td>
			<td>'.$row["packageKg"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["destanationFrom"].'</td>
			<td>'.$row["destanationTo"].'</td>
			<td>'.$row["reciverName"].'</td>
			<td>'.$row["reciverTell"].'</td>
			<td><span class="label label-primary">'.$row["sellPrice"].'</span></td>	
			<td>'.$row["takingDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
   
?>
