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
    var expid = $("#expid").val();
    var expdes = $("#expdes").val();
    var expamount = $("#expamount").val();
    var expdate = $("#expdate").val();
    var user_id = $("#user_id").val();

    
    // Add record
    $.post("addExpense.php", {
        expid: expid,
        expdes: expdes,
        expamount: expamount,
        expdate: expdate,
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        $("#expid").val("");
        $("#expdes").val("");
        $("#expamount").val("");
        $("#expdate").val("");
        //$("#user_id").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {


    $("#up_id").val(up_id);

    $.post("readExpenseDetails.php", {
            
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_expid").val(result.ExpenseTypeId);
            $("#up_expdes").val(result.ExpenseDescription);
            $("#up_expamount").val(result.ExpenseAmount);
            $("#up_expdate").val(result.ExpenseDate);
            $("#up_id").val(result.supplierId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_expid = $("#up_expid").val();
    var up_expdes = $("#up_expdes").val();
    var up_expamount = $("#up_expamount").val();
    var up_expdate = $("#up_expdate").val();
    var up_user_id = $("#up_user_id").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateExpense.php", {
             up_expid: up_expid,
            up_expdes: up_expdes,
            up_expamount: up_expamount,
            up_expdate: up_expdate,
            up_user_id: up_user_id,
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
    url:"deleteExpense.php",
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