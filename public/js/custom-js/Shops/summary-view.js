function showTotalTollCollection(e){
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
        }
    });
}