<?php include("header.php"); ?>
<div class="container">

<!-- Display Msg -->
<div class="col-lg-12 text-center" id="displayMsg" >
</div>


<!-- Display Stock -->
<div class="row">
<div class="col-md-8 col-md-offset-2 text-center">
  <h2>Available Stock</h2>
  <table class="table table-hover table-bordered" id="tbl">
    <thead><tr>
    <th>Sr</th>
    <th>Product</th>
    <th>Length</th>
    </tr></thead>
    <tbody>
    </tbody>
  </table>
</div>
</div>


<!-- Modal for addSeller -->
<div class="modal fade" id="addSellerModal">
  <div class="modal-dialog">
    <!-- modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h1>Add New Seller</h1>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
          <?= form_input(['class'=>'form-control','placeholder'=>'New Seller Name','id'=>'addNewSeller']);?>
          <?= form_submit(['class'=>'btn btn-primary','value'=>'Add','onclick'=>"newUser('seller')"]);?>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <?= anchor('home','cancle',['class'=>'btn btn-default']);?>
      </div>
    </div>
  </div>
</div>


<!-- Modal for addBuyer -->
<div class="modal fade" id="addBuyerModal">
  <div class="modal-dialog">
    <!-- modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h1>Add New Buyer</h1>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
          <?= form_input(['class'=>'form-control','placeholder'=>'New Buyer Name','id'=>'addNewBuyer']);?>
          <?= form_submit(['class'=>'btn btn-primary','value'=>'Add','onclick'=>"newUser('buyer')"]);?>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <?= anchor('home','cancle',['class'=>'btn btn-default']);?>
      </div>
    </div>
  </div>
</div>


<!-- Modal for Purchase -->
<div class="modal fade" id="purchaseModal">
  <div class="modal-dialog">
    <!-- modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h1>Purchase Entry</h1>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <?= form_input(['class'=>'form-control','placeholder'=>'Enter Seller Name','id'=>'sellerName']);?>
            </div>
            <div class="col-lg-6">
              <?= form_input(['class'=>'form-control','placeholder'=>'Bill NO','id'=>'purchasebillno']);?>
            </div>
          </div>
          <div class="purchaselist"></div>
          <div class="row">
            <div class="col-lg-8">
              <?= form_input(['class'=>'form-control','placeholder'=>'Product Name','id'=>'purchaseproductName']);?>
            </div>
            <div class="col-lg-4">
              <?= form_input(['class'=>'form-control','placeholder'=>'Date','type'=>'date','id'=>'purchasedatepicker'])?>
            </div>
          </div>
          <div class="purchaseproductlist"></div>
          <div class="row">
            <div class="col-lg-4">
              <?= form_input(['class'=>'form-control','placeholder'=>'Lenth','id'=>'purchaselength']);?>
            </div>
            <div class="col-lg-4">
              <?= form_input(['class'=>'form-control','placeholder'=>'Price','id'=>'purchaseprice']);?>
            </div>
            <div class="col-lg-4">
              <?= form_input(['class'=>'form-control','placeholder'=>'Discount','id'=>'purchasediscount','value'=>2]);?>
            </div>
          </div>
          <?= form_input(['class'=>'form-control','placeholder'=>'Total','id'=>'purchasetotal']);?>
          <?= form_submit(['class'=>'btn btn-primary','value'=>'Entry','onclick'=>"entry('purchase')"]);?>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <?= anchor('home','cancle',['class'=>'btn btn-default']);?>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Sell -->
<div class="modal fade" id="sellModal">
  <div class="modal-dialog">
    <!-- modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h1>Sell Entry</h1>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
          <?= form_input(['class'=>'form-control','placeholder'=>'Enter Buyer Name','id'=>'buyerName']);?>
          <div class="selllist"></div>
          <?= form_input(['class'=>'form-control','placeholder'=>'Product Name','id'=>'sellproductName']);?>
          <div class="productlist"></div>
          <?= form_input(['class'=>'form-control','placeholder'=>'Lenth','id'=>'selllength']);?>
          <?= form_input(['class'=>'form-control','placeholder'=>'Price','id'=>'sellprice']);?>
          <?= form_input(['class'=>'form-control','placeholder'=>'Total','id'=>'selltotal']);?>
          <?= form_submit(['class'=>'btn btn-primary','value'=>'Entry','onclick'=>"entry('sell')"]);?>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <?= anchor('home','cancle',['class'=>'btn btn-default']);?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
// New User
  function newUser(key) {
    // for seller
    if (key == 'seller') {
      var name = $('#addNewSeller');
          if (name.val() == '') {
              name.css('border', '1px solid red');
          }else {
              $.ajax({
                url: '<?php echo site_url("home/addSeller");?>',
                method: 'POST',
                dataType: 'text',
                data: {
                  name: name.val()
                }, success: function (response) {
                  $('#addNewSeller').val('');
                  $('#addSellerModal').modal('hide');
                  $('#displayMsg').html(response);
                }
            });
          }
    }

    // for Buyer
    if (key == 'buyer') {
      var name = $('#addNewBuyer');
          if (name.val() == '') {
              name.css('border', '1px solid red');
          }else {
              $.ajax({
                url: '<?php echo site_url("home/addBuyer");?>',
                method: 'POST',
                dataType: 'text',
                data: {
                  name: name.val()
                }, success: function (response) {
                  $('#addNewBuyer').val('');
                  $('#addBuyerModal').modal('hide');
                  $('#displayMsg').html(response);
                }
            });
          }
    }
  }

// Entry
  function entry(key) {
// For Purchase Modal
    if (key == 'purchase') {

      console.log('purchase entry triggered');
      var sellername = $('#sellerName');
      var billno = $('#purchasebillno');
      var productname = $('#purchaseproductName');
      var date = $('#purchasedatepicker');
      var length = $('#purchaselength');
      var price = $('#purchaseprice');
      var total = $('#purchasetotal');
          if (isNotEmpty(sellername) && isNotEmpty(billno) && isNotEmpty(productname) && isNotEmpty(date) && isNotEmpty(length) && isNotEmpty(price) && isNotEmpty(total)) {
            $.ajax({
                url: '<?php echo site_url("home/entry_Purchase");?>',
                method: 'POST',
                dataType: 'text',
                data: {
                  sellername: sellername.val(),
                  productname: productname.val(),
                  date: date.val(),
                  length: length.val(),
                  price: price.val(),
                  total: total.val(),
                  billno: billno.val()
                }, success: function (response) {
                  $('#sellerName').val('');
                  $('#purchaseproductName').val('');
                  $('#sellproductName').val('');
                  $('#purchaselength').val('');
                  $('#purchaseprice').val('');
                  $('#purchasetotal').val('');
                  $('#purchasebillno').val('');
                  $('#purchaseModal').modal('hide');
                  $('#displayMsg').html(response);
                  getStock();
                }
              });
          }
    }

// For Sell Modal
    if (key == 'sell') {

      console.log('sell entry triggered');
      var buyername = $('#buyerName');
      var productname = $('#sellproductName');
      var length = $('#selllength');
      var price = $('#sellprice');
      var total = $('#selltotal');
          if (isNotEmpty(buyername) && isNotEmpty(productname) && isNotEmpty(length) && isNotEmpty(price) && isNotEmpty(total)) {
            $.ajax({
                url: '<?php echo site_url("home/entry_Sell");?>',
                method: 'POST',
                dataType: 'text',
                data: {
                  buyername: buyername.val(),
                  productname: productname.val(),
                  length: length.val(),
                  price: price.val(),
                  total: total.val()
                }, success: function (response) {
                  $('#buyerName').val('');
                  $('#sellproductName').val('');
                  $('#purchaseproductName').val('');
                  $('#selllength').val('');
                  $('#sellprice').val('');
                  $('#selltotal').val('');
                  $('#sellModal').modal('hide');
                  $('#displayMsg').html(response);
                  getStock();
                }
              });
          }
    }
  }

  // To Check Input IS Not Empty
  function isNotEmpty(caller) {
    if (caller.val() == '') {
      caller.css('border', '1px solid red');
      return false;
    }else {
      caller.css('border', '');
      return true;
    }
  }

// Display Stock
  function getStock(){
    $.ajax({
      url: '<?php echo site_url("home/getStock");?>',
      method: 'POST',
      dataType: 'text',
      data: {
      }, success: function(response) {
        $('tbody').html('');
        $('tbody').html(response);
      }
    });
  }
</script>


