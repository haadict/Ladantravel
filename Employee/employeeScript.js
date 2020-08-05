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
    var empname = $("#empname").val();
    var empgender = $("#empgender").val();
    var emptell = $("#emptell").val();
    var empadrr = $("#empadrr").val();
    var empemail = $("#empemail").val();
    var emptitle = $("#emptitle").val();
    var empsalary = $("#empsalary").val();
    var comid = $("#comid").val();
    var branchid = $("#branchid").val();

   // alert(logo);
    // Add record
    $.post("addEmployee.php", {
        empname: empname,
        empgender: empgender,
        emptell: emptell,
        empadrr: empadrr,
        empemail: empemail,
        emptitle: emptitle,
        empsalary: empsalary,
        comid: comid,
        branchid: branchid,
        
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");
        // clear fields from the popup
        // $("#cname").val("");
        // $("#tell").val("");
        // $("#addr").val("");
        // $("#email").val("");
        // ("#web").val("");
        // $("#logo").val("");
        // $("#email").val("");
        // ("#web").val("");
        // $("#logo").val("");
        //$("#user_id").val("");
        location.reload();
       
        
    });
}
// When updating
function GetUpdateDetails(up_id) {

    
    $("#up_id").val(up_id);

    $.post("readEmployeeDetails.php", {
           
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_empname").val(result.EmployeeName);
            $("#up_empgender").val(result.EmployeeGender);
            $("#up_emptell").val(result.EmployeePhone);
            $("#up_empadrr").val(result.EmployeeAddress);
            $("#up_empemail").val(result.EmployeeEmail);
            $("#up_emptitle").val(result.EmployeeTitle);
            $("#up_empsalary").val(result.EmployeeSalary);
            $("#up_comid").val(result.EmployeeCompanyID);
            $("#up_branchid").val(result.EmployeeBranchID);
            
            

            $("#up_id").val(result.EmployeeId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_empname = $("#up_empname").val();
    var up_empgender = $("#up_empgender").val();
    var up_emptell = $("#up_emptell").val();
    var up_empadrr = $("#up_empadrr").val();
    var up_empemail = $("#up_empemail").val();
    var up_emptitle = $("#up_emptitle").val();
    var up_empsalary = $("#up_empsalary").val();
    var up_comid = $("#up_comid").val();
    var up_branchid = $("#up_branchid").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateEmployee.php", {
             up_empname: up_empname,
            up_empgender: up_empgender,
            up_emptell: up_emptell,
            up_empadrr: up_empadrr,
            up_empemail:up_empemail,
            up_emptitle: up_emptitle,
             up_empsalary: up_empsalary,
            up_comid:up_comid,
            up_branchid: up_branchid,
            up_id : up_id
            //alert(up_cname,);
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
    url:"deleteEmployee.php",
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