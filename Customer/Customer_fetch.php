<?php
include('db.php');
//include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_customers ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE CustomerName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Customerphone LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

 $sub_array = array();
 $sub_array[] = $row["CustomerName"];
 $sub_array[] = $row["Customerphone"];
 $sub_array[] = $row["CustomerAddress"];
 $sub_array[] = $row["CustomerEmail"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["CustomerId"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["CustomerId"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
// get all records
function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT * FROM tbl_customers");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}
// End of Selecting data from database
?>