<?php
 include("reportClass.php");
if(empty($_POST["startDate"])){
   
     $data ="";
	 $data .= '
			 <table class="table table-hover margin bottom">
				<thead>
				<tr>
					<th style="width: 1%" class="text-center">No.</th>
					<th>Epense Type</th>
					<th>Description</th>
					<th>Amount</th>
					<th>Expense Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getSupplierList();
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["ExpenseTypeName"].'</td>
			<td>'.$row["ExpenseDescription"].'</td>
			<td><span class="label label-primary">$ '.$row["ExpenseAmount"].'</span></td>	
			<td>'.$row["ExpenseDate"].'</td>

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
					<th>Epense Type</th>
					<th>Description</th>
					<th>Amount</th>
					<th>Expense Date</th>
				</tr>
				</thead>
				<tbody>
			 ';
	 $no=0;
		 $result = getSupplierByDate($_POST["startDate"],$_POST["endDate"]);
		 while($row=$result->fetch()){
			$no++;
			 $data .= '
			<tr>
			<td class="text-center">'.$no.'</td>
			<td>'.$row["ExpenseTypeName"].'</td>
			<td>'.$row["ExpenseDescription"].'</td>
			<td><span class="label label-primary">$ '.$row["ExpenseAmount"].'</span></td>	
			<td>'.$row["ExpenseDate"].'</td>

		</tr>
			 ';
		 }
    $data .= '</tbody></table>';
	 echo $data;
	}
   
?>
