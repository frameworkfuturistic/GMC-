// Get All the Toll Collection Summary between Dates
function showTotalTollCollection(e){
        var targetform = $('#TollTotalCollection');
        var murl = targetform.attr('action');
        var mdata = $("#TollTotalCollection").serialize();
        e.preventDefault();

        $.ajax({
            url: murl,
            type: "post",
            data: mdata,
            datatype: "json",
            success: function(mdata) {
               $('#tollDataTable').DataTable().destroy();
               showTollDataTable(mdata);
            },

            error: function(error) {
                alert(error);
            },
        });
}
// Append all the data on datatable
function showTollDataTable(data){
    $('#tollDataTable').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons: [{
                    extend: 'pdf',
                    text: '<i class="icon-android-print"></i> Export PDF',
                    className: 'pdfButton btn-padding'
                },
                {
                    extend: 'copy',
                    text: '<i class="icon-android-print"></i> Copy',
                    className: 'copyButton btn-padding'
                },
                {
                    extend: 'csv',
                    text: '<i class="icon-android-print"></i> CSV',
                    className: 'csvButton btn-padding'
                },
                {
                    extend: 'excel',
                    text: '<i class="icon-document-text"></i> Excel',
                    className: 'excelButton btn-padding'
                },
                {
                    extend: 'print',
                    text: '<i class="icon-android-print"></i> Print',
                    className: 'printButton btn-padding'
                }
            ]
        },
        "data":data,
        "processing":true,
        "method":"POST",
        "columns": [
        {
            "data":"PaymentID",
            "render": function (data, type, row, meta ) {
                if(row.userType==2){
                    return '<label class="switch">' +
                        '<input type="checkbox" id="toggle" name="toggle" onchange="functionDeactivation('+ data +')">' +
                        '<span class="slider round"></span>' +
                        '</label> ';
                }
                else{
                    return '#';
                }
              }
        },
        {
            "data": "id"
        },
        {
            "data": "VendorName"
        },
        {
            "data": "Area"
        },
        {
            "data": "PaymentFrom"
        },
        {
            "data": "PaymentTo"
        },
        {
            "data": "Rate"
        },
        {
            "data": "Amount"
        },
        {
            "data": "PaymentDate"
        },
        {
            "data": "CollectedBy"
        }
    ],
        "columnDefs": [{
            "width": "50px",
            "targets": 0
        },
        {
            "width": "20px",
            "targets": 1
        },
        {
            "width": "20px",
            "targets": 2
        },
        {
            "width": "50px",
            "targets": 3
        },
        {
            "width": "50px",
            "targets": 4
        },
        {
            "width": "20px",
            "targets": 5
        },
        {
            "width": "20px",
            "targets": 6
        },
        {
            "width": "20px",
            "targets": 7
        },
        {
            "width": "20px",
            "targets": 8
        },
        {
            "width": "20px",
            "targets": 9
        }
    ],

    // Calculating Total Sum Amount
    "footerCallback": function (row, data, start, end, display) {
        var api = this.api();
 
        // Remove the formatting to get integer data for summation
        var intVal = function (i) {
            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
        };

        // Total over all pages
        total = api
            .column(7)
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Total over this page
        pageTotal = api
            .column(7, { page: 'current' })
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Update footer
        $(api.column(7).footer()).html('₹ ' + pageTotal.toFixed(2) + ' ( ₹ ' + total.toFixed(2) + ' total)');
        console.log(total,pageTotal);
    }
    });
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////

// Get All Shop Payments Between Dates
function showTotalShopCollection(e){
    var targetform = $('#TotalShopCollection');
    var murl = targetform.attr('action');
    var mdata = $("#TotalShopCollection").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function(mdata) {
           $('#shopDataTable').DataTable().destroy();
           showShopDataTable(mdata);
        },

        error: function(error) {
            alert(error);
        },
    });
}

// Append all the shop Data on Datatable
function showShopDataTable(data){
    $('#shopDataTable').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons: [{
                    extend: 'pdf',
                    text: '<i class="icon-android-print"></i> Export PDF',
                    className: 'pdfButton btn-padding'
                },
                {
                    extend: 'copy',
                    text: '<i class="icon-android-print"></i> Copy',
                    className: 'copyButton btn-padding'
                },
                {
                    extend: 'csv',
                    text: '<i class="icon-android-print"></i> CSV',
                    className: 'csvButton btn-padding'
                },
                {
                    extend: 'excel',
                    text: '<i class="icon-document-text"></i> Excel',
                    className: 'excelButton btn-padding'
                },
                {
                    extend: 'print',
                    text: '<i class="icon-android-print"></i> Print',
                    className: 'printButton btn-padding'
                }
            ]
        },
        "data":data,
        "processing":true,
        "method":"POST",
        "columns": [
        {
            "data":"PaymentID",
            "render": function ( data, type, row, meta ) {
                if(row.userType==2){
                    return  '<label class="switch">' +
                        '<input type="checkbox" id="toggle" name="toggle" onchange="functionShopDeactivation('+ data +')">' +
                        '<span class="slider round"></span>' +
                        '</label> ';
                }
                else{
                    return '#';
                }
            }
        },

        {
            "data": "ShopNo"
        },
        {
            "data": "Circle"
        },
        {
            "data": "Allottee"
        },
        {
            "data": "PaidFrom"
        },
        {
            "data": "PaidTo"
        },
        {
            "data": "Amount"
        },
        {
            "data": "Rate"
        },
        {
            "data": "Months"
        },
        {
            "data": "PaymentDate"
        },
        {
            "data": "TaxCollector"
        }
    ],
        "columnDefs": [{
            "width": "50px",
            "targets": 0
        },
        {
            "width": "20px",
            "targets": 1
        },
        {
            "width": "20px",
            "targets": 2
        },
        {
            "width": "20px",
            "targets": 3
        },
        {
            "width": "20px",
            "targets": 4
        },
        {
            "width": "20px",
            "targets": 5
        },
        {
            "width": "20px",
            "targets": 6
        },
        {
            "width": "20px",
            "targets": 5
        },
        {
            "width": "20px",
            "targets": 6
        },
        {
            "width": "20px",
            "targets": 7
        },
        {
            "width": "20px",
            "targets": 8
        }
    ],

    // Calculating Total Sum Amount
    "footerCallback": function (row, data, start, end, display) {
        var api = this.api();
 
        // Remove the formatting to get integer data for summation
        var intVal = function (i) {
            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
        };

        // Total over all pages
        total = api
            .column(6)
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Total over this page
        pageTotal = api
            .column(6, { page: 'current' })
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Update footer
        $(api.column(6).footer()).html('₹ ' + pageTotal.toFixed(2) + ' ( ₹ ' + total.toFixed(2) + ' total)');
        console.log(total,pageTotal);
    }
    });
}

// Function used for deactivating the transactions for the tolls payments
function functionDeactivation(id){
    let token = $('meta[name="csrf_token"]').attr('content');
    var status=$('#toggle').is(":checked");
    var murl = 'tolls/payments/activation/'+id;
    $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        url: murl,
        data: {
            "_method": 'post',
            "_token": token,
            "toggle":status,
        },
        datatype: "json",
        success: function(result) {
            swal({
                title: result.message,
                icon: "success",
              });
        },

        error: function(error) {
            alert(error);
        },
    });
}

// Function for shop Deactivation
function functionShopDeactivation(id){
    let token = $('meta[name="csrf_token"]').attr('content');
    var status=$('#toggle').is(":checked");
    var murl = 'shops/payments/activation/'+id;
    $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        url: murl,
        data: {
            "_method": 'post',
            "_token": token,
            "toggle":status,
        },
        datatype: "json",
        success: function(result) {
            swal({
                title: result.message,
                icon: "success",
              });
        },

        error: function(error) {
            alert(error);
        },
    });
}