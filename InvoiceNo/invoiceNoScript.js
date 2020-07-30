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
    var pref = $("#pref").val();
    var inv_no = $("#inv_no").val();
    
    // Add record
    $.post("addInvoiceNo.php", {
        pref: pref,
        inv_no: inv_no,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        $("#pref").val("");
        $("#inv_no").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {

    // Add User ID to the hidden field for furture usage
    $("#up_id").val(up_id);
    $.post("readInvoiceNoDetails.php", {
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_pref").val(result.Prefix);
            $("#up_inv_no").val(result.invoiceNo);
            


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_inv_no = $("#up_inv_no").val();
    var up_pref = $("#up_pref").val();

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateInvoiceNo.php", {
            up_id: up_id,
            up_pref: up_pref,
            up_inv_no: up_inv_no,
            
        },
        function (data, status) {
            // hide modal popup
			alert(data);
           $("#updateModal").modal("hide");
            $("#up_inv_no").val("");
       
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
    url:"deleteInvoiceNo.php",
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