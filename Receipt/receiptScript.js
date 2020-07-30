<script>

// $(document).ready(function () {
//     // READ recods on page load
//     readRecords(); // calling function
// });
// // READ records
// function readRecords() {
//     $.get("readRecord.php", {}, function (data, status) {
//         $(".records_content").html(data);
//     });
// }

// Add Record
function addRecord(){
	
    // get values
    var inv = $("#inv").val();
    var amount = $("#amount").val();
    var paid = $("#paid").val();
    var blance = $("#blance").val();
    var recdate = $("#recdate").val();
    var pm = $("#pm").val();
    var user_id = $("#user_id").val();
    
    // Add record
    $.post("addReceipt.php", {
        inv: inv,
        amount: amount,
        paid: paid,
        blance: blance,
        recdate: recdate,
        pm: pm,
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        $("#inv").val("");
        $("#amount").val("");
        $("#paid").val("");
        $("#blance").val("");
        $("#recdate").val("");
        $("#pm").val("");
        //$("#user_id").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {


    $("#up_id").val(up_id);

    $.post("readReceiptDetails.php", {
            
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_inv").val(result.invoiceId);
            $("#up_amount").val(result.Amount);
            $("#up_paid").val(result.Paid);
            $("#up_blance").val(result.Balance);
            $("#up_pm").val(result.pymentMethod);
            $("#up_recdate").val(result.ReciptDate);
            $("#up_id").val(result.receiptId);

        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_inv = $("#up_inv").val();
    var up_amount = $("#up_amount").val();
    var up_paid = $("#up_paid").val();
    var up_blance = $("#up_blance").val();
    var up_pm = $("#up_pm").val();
    var up_recdate = $("#up_recdate").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateReceipt.php", {
             up_inv: up_inv,
            up_amount: up_amount,
            up_paid: up_paid,
            up_blance: up_blance,
            up_recdate: up_recdate,
            up_pm: up_pm,

            up_id : up_id
            
        },
        function (data, status) {
            // hide modal popup
			alert(data);
           $("#updateModal").modal("hide");
            //$("#up_inv_no").val("");
       
        }
    );
}

function GetDelete(del_id) {

    $("#del_id").val(del_id);
  Swal.fire({
            title: 'Are you sure to delete this ?',
            text: "You won't be able to revert this!",
            warning: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
   $.ajax({
    url:"deleteReceipt.php",
    method:"POST",
    data:{del_id:del_id},
    success:function(data)
    {
     //alert(data);
     
     swal.fire({
              title:'Msg! '+data,
              type:'success'
            }),
      setTimeout(function() 
        {
          location.reload();  //Refresh page
        }, 2000);
    }
   });
 }
  });
  // else
  // {
  //  return false; 
  // }

}
</script>