$(function() {
    // datatable for user
    $('#setoran-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/admin/data-setoran"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'images', name: 'images' },
            { data: 'dateSetoran', name: 'dateSetoran' },
            { data: 'status', name: 'status' },
        ]
    });

    // datatable for user
    $('#list-order-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/admin/get-list-order"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
            { data: 'orderTotal', name: 'orderTotal' },
            { data: 'status', name: 'status' },
        ]
    });

    var dataUser = $('#member-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/admin/data-member"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'avatar', name: 'avatar' },
            { data: 'name', name: 'name', "width": "20%" },
            { data: 'email', name: 'email' },
            { data: 'pinCode', name: 'pinCode' },
            { data: 'upline', name: 'upline' },
            { data: 'sponsor', name: 'sponsor' },
            { data: 'address', name: 'address' },
            { data: 'phoneNumber', name: 'phoneNumber' },
            { data: 'momName', name: 'momName' },
            { data: 'ahliwaris', name: 'ahliwaris' },
            { data: 'bankName', name: 'bankName' },
            { data: 'action', name: 'action' }
        ]
    });
});