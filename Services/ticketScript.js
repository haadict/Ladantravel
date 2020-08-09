<script>

// Add Ticket Operation
function addTicket(){
  
    // get values
    var custid = $("#custid").val();
    var rdate = $("#rdate").val();
    var ticket = $("#ticket").val();
    var airline = $("#airline").val();
    var dfrom = $("#dfrom").val();
    var dto = $("#dto").val();
    var tcprice = $("#tcprice").val();
    var sprice = $("#sprice").val();
    var tprofit = $("#tprofit").val();
     var tdesc = $("#tdesc").val();
    
    var user_id = $("#user_id").val();

 // alert(vdate);
    // Add record
    $.post("addTicket.php", {
        custid: custid,
        rdate: rdate,
        ticket: ticket,
        airline: airline,
        dfrom: dfrom,
        dto: dto,
        tcprice: tcprice,
        sprice: sprice,
        tprofit: tprofit,
        tdesc: tdesc,
       
        user_id: user_id,
        
    }, function (data, status) {
        // close the popup
    alert(data);
        $("#addModal").modal("hide");
        location.reload();
       
        
    });
}
// end of Ticket Operation
// When updating
function GetUpdateDetails(up_id) {

    
    $("#up_id").val(up_id);

    $.post("readTicketDetails.php", {
           
            up_id: up_id
        },
        function (data, status) {
            // PARSE json data
            var result = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#up_rdate").val(result.ReservaionDate);
            $("#up_ticket").val(result.TicketNo);
            $("#up_airline").val(result.airLineId);
            $("#up_dfrom").val(result.DestanationFrom);
            $("#up_dto").val(result.DestanationTo);
            $("#up_tcprice").val(result.CostPrice);
            $("#up_sprice").val(result.SellPrice);
            $("#up_tprofit").val(result.Profit);
            $("#up_tdesc").val(result.ticketDescription);
            // $("#up_sellprice").val(result.sellPrice);
            // $("#up_profit").val(result.profit);
            //$("#up_desc").val(result.visaDescription);
            //$("#up_user_id").val(result.EmployeeBranchID);
            
            

            $("#up_id").val(result.ticketId);


        }
    );
    // Open modal popup
      $("#updateModal").modal("show");

}
// When button update is clicked
function updateRecord() {
    // get values
    var up_cusid = $("#up_cusid").val();
    var up_rdate = $("#up_rdate").val();
    var up_ticket = $("#up_ticket").val();
    var up_airline = $("#up_airline").val();
    var up_dfrom = $("#up_dfrom").val();
    var up_dto = $("#up_dto").val();
    var up_tcprice = $("#up_tcprice").val();
    var up_sprice = $("#up_sprice").val();
    var up_tprofit = $("#up_tprofit").val();
    var up_tdesc = $("#up_tdesc").val();
    // var up_profit = $("#up_profit").val();
    // var up_desc = $("#up_desc").val();
    var up_user_id = $("#up_user_id").val();
    

    // get hidden field value
    var up_id = $("#up_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("updateTicket.php", {
             up_cusid: up_cusid,
            up_rdate: up_rdate,
            up_ticket: up_ticket,
            up_airline: up_airline,
            up_dfrom:up_dfrom,
            up_dto: up_dto,
             up_tcprice: up_tcprice,
            up_sprice:up_sprice,
            up_tprofit: up_tprofit,
            up_tdesc : up_tdesc,
            //  up_profit: up_profit,
            // up_desc:up_desc,
            up_user_id: up_user_id,
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

function GetDelete(t_del_id) {

    $("#t_del_id").val(t_del_id);
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
    url:"deleteVisa.php",
    method:"POST",
    data:{t_del_id:t_del_id,status:'deleteticket'},
    success:function(data)
    {
     //alert(data);
     
     swal.fire({
              title:'Msg! '+data,
              type:'success'
            })
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