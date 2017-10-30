$(function(){

getStock();

// $('#tbl').DataTable();

// datePicker
    $('#purchasedatepicker').datepicker();

// Open addSeller Modal
    $('a#addSeller').click(function(){
        $('#addSellerModal').modal('show');
    });


// Open addBuyer Modal
    $('a#addBuyer').click(function(){
        $('#addBuyerModal').modal('show');
    });


// Open Purchase Modal
    $('a#purchase').click(function(){
        $('#purchaseModal').modal();
    });

// Open Purchase Modal
    $('a#sell').click(function(){
        $('#sellModal').modal();
    });

// List Seller Name
    $('#sellerName').keyup(function(){
        var name = $(this).val();
        console.log(name);
        if (name != '') {
            $.ajax({
                url: 'home/search_seller',
                method: 'POST',
                type: 'text',
                data: {
                    name: name
                },success: function(response) {
                    $('.purchaselist').html(response);
                }
            });
        }
    });

// Select Seller Name From List
    $(document).on('click','.seller', function() {
        var name = $(this).text();
        $('#sellerName').val(name);
        $('.purchaselist').html('');
    });


// List Buyer Name
    $('#buyerName').keyup(function(){
        var name = $(this).val();
        console.log(name);
        if (name != '') {
            $.ajax({
                url: 'home/search_buyer',
                method: 'POST',
                type: 'text',
                data: {
                    name: name
                },success: function(response) {
                    $('.selllist').html(response);
                }
            });
        }
    });

// Select Buyer Name From List
    $(document).on('click','.buyer', function() {
        var name = $(this).text();
        $('#buyerName').val(name);
        $('.selllist').html('');
    });

// List Product Name for Purchase
    $('#purchaseproductName').keyup(function(){
        var name = $(this).val();
        console.log(name);
        if (name != '') {
            $.ajax({
                url: 'home/search_product',
                method: 'POST',
                type: 'text',
                data: {
                    name: name
                },success: function(response) {
                    $('.purchaseproductlist').html(response);
                }
            });
        }
    });

// Select Product Name From List for Purchase
    $(document).on('click','.purchase', function() {
        var name = $(this).text();
        $('#purchaseproductName').val(name);
        $('.purchaseproductlist').html('');
    });

// List Product Name for Sell
    $('#sellproductName').keyup(function(){
        var name = $(this).val();
        console.log(name);
        if (name != '') {
            $.ajax({
                url: 'home/search_product',
                method: 'POST',
                type: 'text',
                data: {
                    name: name
                },success: function(response) {
                    $('.productlist').html(response);
                }
            });
        }
    });

// Select Product Name From List for Sell
    $(document).on('click','.sell', function() {
        var name = $(this).text();
        $('#sellproductName').val(name);
        $('.productlist').html('');
    });

// Total for Purchase
    $('#purchasetotal').click(function(){
        var len = $('#purchaselength').val();
        var pri = $('#purchaseprice').val();
        var dis_rate = $('#purchasediscount').val();
        console.log(dis_rate);
        var dis = (len * pri)*dis_rate/100;
        var tot = (len * pri) - dis;
        $(this).val(tot);
    });

// Total for Sell
    $('#selltotal').click(function(){
        var len = $('#selllength').val();
        var pri = $('#sellprice').val();
        // var dis = $('#');
        var tot = (len * pri);
        $(this).val(tot);
    });

});

