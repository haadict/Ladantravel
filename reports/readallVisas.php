<?php
    include("reportClass.php");
if(empty($_POST["startDate"])){
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Visa Date</th>
					<th>Customer Name</th>
					<th>Passport Number</th>
					<th>Passport Expire Date</th>
					<th>Country</th>
					<th>Duration</th>
					<th>Cost</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getVisasList();
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["visaDate"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["passportNo"].'</td>
			<td>'.$row["passportExpireDate"].'</td>
			<td>'.$row["country"].'</td>
			<td>'.$row["duration"].'</td>
			<td><span class="label label-primary">'.$row["sellPrice"].'</span></td>	

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
					<th>Visa Date</th>
					<th>Customer Name</th>
					<th>Passport Number</th>
					<th>Passport Expire Date</th>
					<th>Country</th>
					<th>Duration</th>
					<th>Cost</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getVisasTableByDate($_POST["startDate"],$_POST["endDate"]);
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["visaDate"].'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["passportNo"].'</td>
			<td>'.$row["passportExpireDate"].'</td>
			<td>'.$row["country"].'</td>
			<td>'.$row["duration"].'</td>
			<td><span class="label label-primary">'.$row["sellPrice"].'</span></td>	

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
   
?>
