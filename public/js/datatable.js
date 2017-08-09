$(function() {
    var token = document.getElementsByName('csrf-token');

    var dataTable = $('#setoran-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/setoran-member"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'images', name: 'images' },
            { data: 'dateSetoran', name: 'dateSetoran' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});