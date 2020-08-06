  var vat=0;
    var ExTotal=flag=0;
    var VAT=$("#vat").val();
    var qutationId=$("#invId").val();
    $(function()
    {
       // alert(qutationId);
    if(qutationId==0)
    {
      $("#save").show();
      $("#servId").change(function(){
        var barcodeId=$("#servId").val();
        $.post("getServices.php",{barcodeId:barcodeId,status:"RedBarcode"}, function (data, status)
        {
          var services = JSON.parse(data);
          // console.log(data);
          // alert(services.ServId);

          for(var i in items){
            if (items[i].product_id==services.ServId){
              flag=0;
              break;
            }
            else{
              flag=1;
            }
            
          }
          addItemToCart(services.ServId,services.ServName,1,0,0,0,flag,0);
          ExTotal+=parseFloat(services.SalesPrice);
          var html = '';
          $("#tbody").empty();
          total=pureVat=0;
          for (var i = 0; i < items.length; i++) {
            $("#tbody").append(
              '<tr>'+
              '<td >'+items[i].product_name+'</td>'+
              '<input type="hidden" id="product_name'+items[i].product_id+'" value="'+items[i].product_name+'">'+
              '<td style="width:190px;"><input id="qty'+items[i].product_id+'" onblur="setItem('+items[i].product_id+',1,0);" value="'+items[i].product_qty+'"  class="form-control col-md-6"></td>'+
              '<td style="width:190px;"><input id="product_price'+items[i].product_id+'" onblur="setPrice('+items[i].product_id+',1,0);" value="'+items[i].product_price+'"  class="form-control col-md-6"></td>'+
              '<td style="width:190px;"><input type="text" name="discount[]" id="product_discount'+items[i].product_id+'" value="'+items[i].product_disc+'"  onblur="setDiscount('+items[i].product_id+');" class="form-control col-md-6" /></td>'+

              '<td><input class="border-checkbox"  id="vat'+items[i].product_id+'" name="vat" type="checkbox" onclick="setVat('+VAT+','+items[i].product_id+');" ></td>'+

              '<label>$</label><td id="itemSubtotal'+items[i].product_id+'" >'+
              ((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc))).toFixed(2)
              +'</td>'+
              '<td><button name="delete" class="delete btn btn-danger" id="'+items[i].product_id+'" onclick="removeItem('+items[i].product_id+')"><i class="fa fa-times tip pointer posdel"></i></button></td>'+
              '</tr>');

            total = total +((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc)));
            pureVat =pureVat+ (Number(items[i].pro_vat));
            if (items[i].pro_vat>0 ) {
              $("#vat"+items[i].product_id).prop('checked', true);
            }
            else
            {
              // alert(items[i].pro_vat);
              items[i].pro_vat=0;
              $("#vat"+items[i].product_id).prop('checked', false);
            }
          }
          $("#SubTotal").text(total.toFixed(2));
          $("#vatT").text(pureVat);
          var savefrandTotal=total+pureVat;
          var grandTotal=parseFloat(savefrandTotal.toFixed(2));
          $("#finalTotal").text((grandTotal));

        }); 
      });
    }
    else
    {
      $("#update").show();

      $('#LastInsertedId').val(qutationId);
      $.post("getServices.php",{qutationId:qutationId,status:"RedQuatationDetails"}, function (data, status)
      {
        $.each(data, function(key, value){ 
        $("#createdDate").val(value.InvoiceDate);
        $("#cusId").val(value.CustomerId);
        addItemToCart(value.ServiceId,value.ServName,value.Qty,value.Amount,value.Discount,value.Tax,flag,value.Total);
        // console.log(items);
        for(var i in items){
          if (items[i].product_id==value.ServiceId){
            flag=0;
            break;
          }
          else{
            flag=1;
          }
        }
      });
        total=pureVat=0;
        for (var i = 0; i < items.length; i++) {
          $("#tbody").append(
            '<tr>'+
            '<td >'+items[i].product_name+'</td>'+
            '<input type="hidden" id="product_name'+items[i].product_id+'" value="'+items[i].product_name+'">'+
            '<td style="width:190px;"><input id="qty'+items[i].product_id+'" onblur="setItem('+items[i].product_id+',1,0);" value="'+items[i].product_qty+'"  class="form-control col-md-6"></td>'+
              '<td style="width:190px;"><input id="product_price'+items[i].product_id+'" onblur="setPrice('+items[i].product_id+',1,0);" value="'+items[i].product_price+'"  class="form-control col-md-6"></td>'+
            '<td style="width:190px;"><input type="text" name="discount[]" id="product_discount'+items[i].product_id+'" value="'+items[i].product_disc+'"  onblur="setDiscount('+items[i].product_id+');" class="form-control col-md-6" /></td>'+

            '<td><input class="border-checkbox"  id="vat'+items[i].product_id+'" name="vat" type="checkbox" onclick="setVat('+items[i].pro_vat+','+items[i].product_id+');" ></td>'+

            '<label>$</label><td id="itemSubtotal'+items[i].product_id+'" >'+
            ((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc))).toFixed(2)
            +'</td>'+
            '<td><button name="delete" class="delete btn btn-danger" id="'+items[i].product_id+'" onclick="removeItem('+items[i].product_id+')"><i class="fa fa-times tip pointer posdel"></i></button></td>'+
            '</tr>');

          total = total +((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc)));
          pureVat =pureVat+ (Number(items[i].pro_vat));
          if (items[i].pro_vat>0 ) {
            $("#vat"+items[i].product_id).prop('checked', true);
          }
          else
          {
            // alert(items[i].pro_vat);
            items[i].pro_vat=0;
            $("#vat"+items[i].product_id).prop('checked', false);
          }
        }
        $("#SubTotal").text(total.toFixed(2));
        $("#vatT").text(pureVat);
        var savefrandTotal=total+pureVat;
        var grandTotal=parseFloat(savefrandTotal.toFixed(2));
        $("#finalTotal").text((grandTotal));

      });
      $("#servId").change(function(){
        var barcodeId=$("#servId").val();
        $.post("getServices.php",{barcodeId:barcodeId,status:"RedBarcode"}, function (data, status)
        {
          var services = JSON.parse(data);
        // console.log(data);
        // alert(data)

          for(var i in items){
            if (items[i].product_id==services.ServId){
              flag=0;
              break;
            }
            else{
              flag=1;
            }

          }
          addItemToCart(services.ServId,services.ServName,1,0,0,0,flag,0);
          ExTotal+=parseFloat(services.SalesPrice);
          var html = '';
          $("#tbody").empty();
          total=pureVat=0;
          for (var i = 0; i < items.length; i++) {
            $("#tbody").append(
              '<tr>'+
              '<td >'+items[i].product_name+'</td>'+
              '<input type="hidden" id="product_name'+items[i].product_id+'" value="'+items[i].product_name+'">'+
              '<td style="width:190px;"><input id="qty'+items[i].product_id+'" onblur="setItem('+items[i].product_id+',1,0);" value="'+items[i].product_qty+'"  class="form-control col-md-6"></td>'+
              '<td style="width:190px;"><input id="product_price'+items[i].product_id+'" onblur="setPrice('+items[i].product_id+',1,0);" value="'+items[i].product_price+'"  class="form-control col-md-6"></td>'+
             
              '<td style="width:190px;"><input type="text" name="discount[]" id="product_discount'+items[i].product_id+'" value="'+items[i].product_disc+'"  onblur="setDiscount('+items[i].product_id+');" class="form-control col-md-6" /></td>'+

              '<td><input class="border-checkbox"  id="vat'+items[i].product_id+'" name="vat" type="checkbox" onclick="setVat('+VAT+','+items[i].product_id+');" ></td>'+

              '<label>$</label><td id="itemSubtotal'+items[i].product_id+'" >'+
              ((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc))).toFixed(2)
              +'</td>'+
              '<td><button name="delete" class="delete btn btn-danger" id="'+items[i].product_id+'" onclick="removeItem('+items[i].product_id+')"><i class="fa fa-times tip pointer posdel"></i></button></td>'+
              '</tr>');

            total = total +((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc)));
            pureVat =pureVat+ (Number(items[i].pro_vat));
            if (items[i].pro_vat>0 ) {
              $("#vat"+items[i].product_id).prop('checked', true);
            }
            else
            {
              // alert(items[i].pro_vat);
              items[i].pro_vat=0;
              $("#vat"+items[i].product_id).prop('checked', false);
            }
          }
          $("#SubTotal").text(total.toFixed(2));
          $("#vatT").text(pureVat);
          var savefrandTotal=total+pureVat;
          var grandTotal=parseFloat(savefrandTotal.toFixed(2));
          $("#finalTotal").text((grandTotal));

        }); 
      });
    }
  });
$(document).on('click','.delete',function(){
  var product_id = $(this).attr('id');
  var act = "remove";
  if (confirm("Are you sure you want to remove this product?")) 
  {
    removeItem(product_id);
      // console.log(items);
      setProduct();
    }
    else
    {
      return false;
    }
  });
var items=postItems=[];
var total=Noqty=0;
var totalAmount=subtotal=0;
var discount=0;
var Item=function (product_id,product_name,product_qty,product_price,product_disc,pro_vat,subTotal) {
  this.product_id=product_id;
  this.product_name=product_name;
  this.product_qty=product_qty;
  this.product_price=product_price;
  this.product_disc=product_disc;
  this.pro_vat=pro_vat;
  this.subTotal=subTotal;
};
function removeItem(id) {
  for(var i in items){
    if (items[i].product_id==id){
      items.splice(i,1);
      break;
    }
  }
}
function addItemToCart(id,name,qty,price,disc,pro_vat,flag,subTotal) {

  for(var i in items){
    if (items[i].product_id==id){
      if (flag==0)
        items[i].product_qty ++;
      items[i].product_price=price;
      items[i].product_name=name;
      items[i].product_disc =disc;
      items[i].pro_vat =pro_vat;
      items[i].subTotal =subTotal;
      if (flag==1) 
        items[i].product_qty =qty;
      items[i].product_price=price;
      items[i].product_disc =disc;
      items[i].product_name=name;
      items[i].pro_vat =pro_vat;
      items[i].subTotal =subTotal;
      return;
    }
  }
    // alert(pureVat);
    var item= new Item(id,name,qty,price,disc,pro_vat,subTotal);
    items.push(item);
    //JSON.stringfy(item)
  }
  var newVat=0;
  function setItem(e,flagQty,vat) {

    var product_id = e;
    newVat=0;
    var product_name = $('#product_name'+product_id).val();
    var product_price = $('#product_price'+product_id).val();
    var product_discount = $('#product_discount'+product_id).val();
    var product_qty=parseInt($('#qty'+product_id).val());
    total=product_qty*product_price;
    for (var i = 0; i < items.length; i++)
    {
      if (items[i].product_id==product_id)
      {
        if(items[i].pro_vat!=0 )
        {
          newVat=(total/100*VAT);
          // var vatRound=parseFloat(newVat.toFixed(2));
          $("#vatT").text(newVat);
         }
        }
      }
      var pro_vat=pureVat;
      if (flagQty==0){
        product_qty++;
      }
      if(flagQty==1){
        product_qty=$('#qty'+product_id).val();
      // var product_discount=0;
      // console.log(pro_vat);
    }

    // console.log(product_id,product_name,product_qty,product_price,product_discount,newVat,flagQty,total);
    // console.log(items);
    addItemToCart(product_id,product_name,product_qty,product_price,product_discount,newVat,flagQty,total);
    setProduct();
  }
  function setProduct() 
  {
    console.log('setProduct');
    console.log(items);
    $('#cart').empty();
    $('#cart').html('<table class="table table-striped table-bordered" id="tblquatation">'+
      '<tr>'+
      '<th>Product Name</th>'+
      '<th>Qty</th>'+
      '<th>Price</th>'+
      '<th>Discount %</th>'+
      '<th>VAT</th>'+
      '<th>Total</th>'+
      '<th><i class="fa fa-trash-o"></i>Action</th>'+
      '</tr>'+
      '<tbody id="tbody">');
    Noqty=total=pureVat=0;
    for (var i = 0; i < items.length; i++) {
      
      $('#tbody').append(
        '<tr>'+
        '<td >'+items[i].product_name+'</td>'+
        '<input type="hidden" id="product_name'+items[i].product_id+'" value="'+items[i].product_name+'">'+
        '<td style="width:190px;"><input id="qty'+items[i].product_id+'" onblur="setItem('+items[i].product_id+',1,0);" value="'+items[i].product_qty+'"  class="form-control col-md-6"></td>'+
        '<td style="width:190px;"><input id="product_price'+items[i].product_id+'" onblur="setPrice('+items[i].product_id+',1,0);" value="'+items[i].product_price+'"  class="form-control col-md-6"></td>'+
        
        '<td style="width:190px;"><input type="text" name="discount[]" id="product_discount'+items[i].product_id+'" value="'+items[i].product_disc+'"   onblur="setDiscount('+items[i].product_id+');" class="form-control col-md-6" /></td>'+
        '<td><input class="border-checkbox"  id="vat'+items[i].product_id+'" name="vat" type="checkbox" onclick="setVat('+VAT+','+items[i].product_id+');"></td>'+
        '<label>$</label><td id="itemSubtotal'+items[i].product_id+'">'+
        ((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc))).toFixed(2)
        +'</td>'+
        '<td><button name="delete" class="delete btn btn-danger" id="'+items[i].product_id+'"  onclick="removeItem('+items[i].product_id+')"><i class="fa fa-times tip pointer posdel"></i></button></td>'+
        '</tr>');
      total = total +((Number(items[i].product_qty) * Number(items[i].product_price))-(Number(items[i].product_qty) * Number(items[i].product_price)/100*(items[i].product_disc)));
      pureVat =pureVat+ (Number(items[i].pro_vat));
      if (items[i].pro_vat>0) {
        $("#vat"+items[i].product_id).prop('checked', true);
      }
      else
      {

        $("#vat"+items[i].product_id).prop('checked', false);
      }
    }
    $("#SubTotal").text(total.toFixed(2));
    var vatRound=parseFloat(pureVat.toFixed(2));
    $("#vatT").text(vatRound);
    var savefrandTotal=total+pureVat;
    var grandTotal=parseFloat(savefrandTotal.toFixed(2));
    $("#finalTotal").text((grandTotal));
  }
  // var pro_vat=0;
  function setDiscount(id)
  {
    var discount=$('#product_discount'+id).val();
    var product_name = $('#product_name'+id).val();
    var product_price = $('#product_price'+id).val();
    var product_qty=parseInt($('#qty'+id).val());
    var totalItems=parseFloat($("#itemSubtotal"+id).text());

    var totalItems=newVat=0;
    var disPercentage=0;

    for (var i = 0; i < items.length; i++)
    {
      if (items[i].product_id==id)
      {
        disPercentage=(items[i].subTotal/100*discount);
        console.log("disPercentage="+discount);
        totalItems=(items[i].subTotal-disPercentage);
        newVat=items[i].pro_vat;
       // console.log("totalItems="+totalItems);
       addItemToCart(id,product_name,product_qty,product_price,discount,newVat,1,totalItems);
      // console.log(items);

    }
  }   
  setProduct();

}
 function setPrice(e,flagQty,vat) {

    var product_id = e;
    newVat=0;
    var product_name = $('#product_name'+product_id).val();
    var product_price = $('#product_price'+product_id).val();
    var product_discount = $('#product_discount'+product_id).val();
    var product_qty=parseInt($('#qty'+product_id).val());
    total=product_qty*product_price;
    for (var i = 0; i < items.length; i++)
    {
      if (items[i].product_id==product_id)
      {
        if(items[i].pro_vat!=0 )
        {
          newVat=(total/100*VAT);
          // var vatRound=parseFloat(newVat.toFixed(2));
          $("#vatT").text(newVat);
         }
        }
      }
      var pro_vat=pureVat;
      if (flagQty==0){
        product_qty++;
      }
      if(flagQty==1){
        product_price=$('#product_price'+product_id).val();
      // var product_discount=0;
      // console.log(pro_vat);
    }

    // console.log(product_id,product_name,product_qty,product_price,product_discount,newVat,flagQty,total);
    // console.log(items);
    addItemToCart(product_id,product_name,product_qty,product_price,product_discount,newVat,flagQty,total);
    setProduct();
  }
var pureVat= pureVatR=itemSubtotal=disPercentage=0;
function setVat(vat,id)
{   
  var discount=$('#product_discount'+id).val();
  var product_name = $('#product_name'+id).val();
  var product_price = $('#product_price'+id).val();
  var product_qty=parseInt($('#qty'+id).val());
  if($("#vat"+id).prop('checked')==true){

    itemSubtotal=parseFloat($("#itemSubtotal"+id).text());

    pureVatR=(itemSubtotal/100*vat);

    pureVat= parseFloat(pureVatR.toFixed(2));

    $("#vatT").text(pureVat);

    var savefrandTotal=total+pureVat;
    var grandTotal=parseFloat(savefrandTotal.toFixed(2));
    $("#finalTotal").text((grandTotal));
    addItemToCart(id,product_name,product_qty,product_price,discount,pureVat,1,itemSubtotal);
    console.log(items);
  }
  else{

    for (var i = 0; i < items.length; i++)
    {
      if (items[i].id==id)
      {
        items[i].pro_vat=0 ;
        tempoVAT=items[i].pro_vat;
      }
    }
    addItemToCart(id,product_name,product_qty,product_price,discount,0,1,itemSubtotal);
  }

  setProduct();
}
function saveReceipt() {
  var client = $('#cusId').val();
  var barcodeId = $('#servId').val();

  var createdDate = $('#createdDate').val();
  var createdBy = 1;

  var grandTotal = parseFloat($('#finalTotal').text());
	// alert("kkkk "+grandTotal);

  $('#span').remove();
   if (createdDate == '') {
    $('#createdDate').after('<span id="span" style="color:red">Please choose created date!</span>');
  }
  else if (client == '') {
    $('#cusId').after('<span id="span" style="color:red">Please choose a client!</span>');
  }
  else if (barcodeId == '') {
    $('#servId').after('<span id="span" style="color:red">Please choose a Barcode!</span>');
  }
  else{
    $('#span').remove();
    postItems=[];
      // for (var i = items.length - 1; i >= 0; i--) {
      //  info = items[i].product_id + "," + items[i].product_qty + "," + items[i].product_price + "," + items[i].product_disc + "," + items[i].pro_vat;
      //  postItems.push(info);
      // }
      console.log(items);
      for (var i = 0; i< items.length; i++) {
        var info = items[i].product_id + "," + items[i].product_qty + "," + items[i].product_price + "," + items[i].product_disc + "," + items[i].pro_vat;
        postItems.push(info);
      }
      $.ajax({
        url: 'add.php',
        method: 'POST',
        data: 
        {
          status: 'addQuotation', 
          client: client, 
          createdDate: createdDate, 
          createdBy: createdBy, 
          grandTotal:grandTotal, 
          items: postItems
        },
        success: function(data) {
        	// alert(data);
        // window.location.replace("../Clients/clientsProfile?clientId="+client);
        $('#savedSuccess2').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'
        +'<strong> Receipt !</strong> You have successfully Added '
        +'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        +'  <span aria-hidden="true">×</span>'
        +'</button>'
        +'</div>');
        window.location.replace("printRec.php?invId="+data);
        $('#LastInsertedId').val(data);
      }
    });
    }
  }
  function updateReceipt() {
  var client = $('#cusId').val();
  var barcodeId = $('#servId').val();

  var createdDate = $('#createdDate').val();
  var createdBy = 1;

  var grandTotal = parseFloat($('#finalTotal').text());

  $('#span').remove();
   if (createdDate == '') {
    $('#createdDate').after('<span id="span" style="color:red">Please choose created date!</span>');
  }
  else if (client == '') {
    $('#cusId').after('<span id="span" style="color:red">Please choose a client!</span>');
  }
  else{
    $('#span').remove();
    postItems=[];
    // for (var i = items.length - 1; i >= 0; i--) {
    //  info = items[i].product_id + "," + items[i].product_qty + "," + items[i].product_price + "," + items[i].product_disc + "," + items[i].pro_vat;
    //  postItems.push(info);
    // }
    // console.log('updateQuotation');
    console.log(items);
      for (var i = 0; i< items.length; i++) {
        var info = items[i].product_id + "," + items[i].product_qty + "," + items[i].product_price + "," + items[i].product_disc + "," + items[i].pro_vat;
        postItems.push(info);
      }
      console.log('updateQuotation');
      console.log(postItems);
      $.ajax({
        url: 'add.php',
        method: 'POST',
        data: 
        {
          status: 'updateQuotation', 
          client: client, 
          createdDate: createdDate, 
          createdBy: createdBy, 
          grandTotal:grandTotal, 
          items: postItems,
          qutationId:qutationId
        },
        success: function(data) {
        	// alert(data);
      window.location.replace("allReceipts.php?cusId="+client);
      $('#savedSuccess2').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'
        +'<strong> QUATATION !</strong> You have successfully Update '
        +'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        +'  <span aria-hidden="true">×</span>'
        +'</button>'
        +'</div>');
        // window.location.reload();
        // $('#LastInsertedId').val(data);
      }
    });
    }
  }
// function viewPDF() {
//   var lastQuoteId  = $('#LastInsertedId').val();
//   var client = $('#clientId').val();
//   window.open("../desings/pdfQuotetion?client="+client+"&quoteId="+lastQuoteId);
// }