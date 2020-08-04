<?php
require_once'function.php';
if (isset($_POST['status'])) {
	if ($_POST['status'] == 'Updateremove') {
		$Product_Id = $_POST['Product_Id'];
		$quote_id = $_POST['quoteId'];
		$client = $_POST['client'];
	    	//removeQuoteDetails($Product_Id, $quote_id, $client);
	}

	if ($_POST['status'] == 'getAllQuotation') {
		$no = 0;
		$clientId = $_POST['clientId'];
		$result = getAllQuotation($clientId);
		while ($row = $result->fetch()) {
			$no++;
			echo '
			<tr>
			<td width="2%">'.$no.'</td>
			<td>'.$row['Subject'].'</td>
			<td>'.$row['FirstName'].' '.$row['LastName'].'</td>
			<td>'; 
			if ($row['status'] == 0) {
				echo "Drafted";
			}
			if ($row['status'] == 1) {
				echo "Accepted";
			}
			echo '</td>
			<td>$ '.$row['Subtotal'].'</td>
			<td>'.$row['ValidUnitDate'].'</td>
			<td width="5%">'.$row['DateCreated'].'</td>
			<td>
			<a href="../desings/quotetion?client='.$row['clientId'].'&quoteId='.$row['QId'].'" class="btn btn-info btn-sm" title="View quotation"><i class="fa fa-eye"></i></a>
			<a href="../quatation/add?client='.$row['clientId'].'&quoteId='.$row['QId'].'" class="btn btn-success btn-sm" title="Edit quotation"><i class="fa fa-edit"></i></a>
			<button class="btn btn-danger btn-sm" onclick="removeQuote('.$row['QId'].');" title="Remove quotation"><i class="fa fa-close"></i></button>
			</td>
			</tr>
			';
		}

	}


	if ($_POST['status'] == 'addQuotation') {
		$client = $_POST['client'];
		$createdDate = $_POST['createdDate'];
		$createdBy = $_POST['createdBy'];
		$grandTotal = $_POST['grandTotal'];
		$items=$_POST['items'];
		$invoiceId = addInvoice($client,$grandTotal,$createdDate,$createdBy);
		foreach ($items as &$val) 
		{
			$info = $val;
			$separate = explode(",", $info);
			$discount=$separate[2]*$separate[1]/100*$separate[3];
			addInvoiceDetails($invoiceId,$separate[0],$separate[1],$separate[2],$separate[3],$separate[4],($separate[2]*$separate[1]-$discount));
		}
		echo $invoiceId.' '.$grandTotal;
	}


	if ($_POST['status'] == 'updateQuotation') {
		$client = $_POST['client'];
		$createdBy = $_POST['createdBy'];
		$createdDate = $_POST['createdDate'];
		$qutationId = $_POST['qutationId'];
		$grandTotal = $_POST['grandTotal'];
		$items=$_POST['items'];

		deleteInD($qutationId);

		updateInvoice($client,$grandTotal,$createdDate,$createdBy,$qutationId);
		foreach ($items as &$val) 
		{
			$info = $val;
			$separate = explode(",", $info);
			$discount=$separate[2]*$separate[1]/100*$separate[3];
			updateInvoiceDetails($qutationId,$separate[0],$separate[1],$separate[2],$separate[3],$separate[4],($separate[2]*$separate[1]-$discount));
		}
		echo "Updated";
	}

}
?>

