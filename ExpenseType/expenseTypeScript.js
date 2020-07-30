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
    var exp_type = $("#exp_type").val();
    
    // Add record
    $.post("addExpenseType.php", {
        exp_type: exp_type,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        $("#exp_type").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {

    // Add User ID to the hidden field for furture usage
    $("#up_id").val(up_id);
    $.post("readExpenseTypeDetails.php", {
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_exp_type").val(result.ExpenseTypeName);
            


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_exp_type = $("#up_exp_type").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateExpenseType.php", {
            up_id: up_id,
            up_exp_type: up_exp_type,
            
        },
        function (data, status) {
            // hide modal popup
			alert(data);
           $("#updateModal").modal("hide");
            $("#exp_type").val("");
       
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
    url:"deleteExpenseType.php",
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
        }, 5000);
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