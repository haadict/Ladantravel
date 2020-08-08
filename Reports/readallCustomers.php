<?php
 include("reportClass.php");
if(empty($_POST["startDate"])){
   
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Customer Name</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Email</th>
					<th>Register Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getCustomersList();
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["Customerphone"].'</td>
			<td>'.$row["CustomerAddress"].'</td>
			<td>'.$row["CustomerEmail"].'</td>
			<td>'.$row["CustomerCreateDate"].'</td>

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
					<th>Customer Name</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Email</th>
					<th>Register Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getCustomersListByDate($_POST["startDate"],$_POST["endDate"]);
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["CustomerName"].'</td>
			<td>'.$row["Customerphone"].'</td>
			<td>'.$row["CustomerAddress"].'</td>
			<td>'.$row["CustomerEmail"].'</td>
			<td>'.$row["CustomerCreateDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
   
?>
