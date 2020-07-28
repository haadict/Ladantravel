<?php
    // include Database connection file
    include("db.php");

    // Design initial table header
    $data = '';

   $result = $connection->query("SELECT * FROM tbl_customers");

    //if (!$result = mysqli_query($con, $query)) {
    //    exit(mysqli_error($con));
//}

    // if query results contains rows then featch those rows
    if($result->rowcount()>0)
    {
        $number = 0;
        while($row=$result->fetch())
        {
          $number++;
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['CustomerName'].'</td>
                <td>'.$row['Customerphone'].'</td>
                <td>'.$row['CustomerAddress'].'</td>
				<td>'.$row['CustomerEmail'].'</td>
                <td>
                    <button onclick="GetUserDetails('.$row['CustomerId'].')" class="btn btn-warning">Update</button>
                
                    <button onclick="DeleteUser('.$row['CustomerId'].')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';

        }
    }
    else
    {
        // records now found
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

   

    echo $data;
?>
