<script>
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
// READ records
function readRecords() {
    $.get("readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

// Add Record
function addCustomer(){
	
    // get values
    var fullname = $("#fullname").val();
    var tell = $("#tell").val();
    var address = $("#address").val();
	var email = $("#email").val();
	var user_id = $("#user_id").val();

    // Add record
    $.post("addCustomer.php", {
        fullname: fullname,
        tell: tell,
        address: address,
		email: email,
		user_id: user_id
    }, function (data, status) {
        // close the popup
		alert(data);
        $("#addModal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#fullname").val("");
        $("#tell").val("");
        $("#address").val("");
		$("#email").val("");
    });
}
// When updating
function GetCustomerDetails(id) {

    // Add User ID to the hidden field for furture usage
    $("#hidden_custId").val(id);
    $.post("readCustomerDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var Customer = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_fullname").val(Customer.CustomerName);
            $("#update_tell").val(Customer.Customerphone);
            $("#update_address").val(Customer.CustomerAddress);
			$("#update_email").val(Customer.CustomerEmail);

        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateCustomer() {
    // get values
    var fullname = $("#update_fullname").val();
    var tell = $("#update_tell").val();
    var address = $("#update_address").val();
	var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_custId").val();
    alert(fullname);
	alert(tell);
	alert(address);
	alert(email);
	alert(id);
    // Update the details by requesting to the server using ajax
    $.post("updateCustomer.php", {
            id: id,
            fullname: fullname,
            tell: tell,
			address: address,
            email: email
        },
        function (data, status) {
            // hide modal popup
			alert("LLLLLLLLLL");
			alert(data);
            $("#updateModal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
</script>