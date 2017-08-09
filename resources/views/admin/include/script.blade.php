    <script data-turbolinks-track="reload">
        $(document).ready(function(){
            $('#tanggal_lahir').datepicker({
                dateFormat: 'yy-mm-dd'
            });

            $('#note-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.note.getdata') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'username', name: 'username' },
                    { data: 'pincode', name: 'pincode' },
                    { data: 'action', name: 'action' }
                ]

            });

            //pin code
            $('#data-pin').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getDataPin') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'amount', name: 'amount' },
                    { data: 'orderTotal', name: 'orderTotal' },
                    { data: 'action', name: 'action' },
                ]
            });

        	// datatable
        	$('#users-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('member.datatable') !!}',
			        columns: [
			            { data: 'id', name: 'id' },
			            { data: 'sponsorName', name: 'sponsorName' },
			            { data: 'uplineName', name: 'uplineName' },
			            { data: 'name', name: 'name' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
			        ]
			    });

			    //
                $('#setoran-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('member.setoran') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'user.name', name: 'name' },
                        { data: 'dateSetoran', name: 'dateSetoran' },
                        { data: 'totalSetoran', name: 'totalSetoran' },
                        { data: 'images', name: 'images' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });


            $(document).on("keyup", ".has-error input.form-control", function(){
                $(this).removeClass("has-error");
            });

            // change active
            var url = window.location;
            $('ul.nav li a[href="' + url + '"]' ).parent().addClass('active');

            // autocomplete
            src = '{{ route('sponsor.autocomplete')}}';
            src2 = '{{ route('member.autocomplete')}}';
            bank = '{{ route('bank.autocomplete')}}';

            $('#sponsor_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);
                           
                        }
                    });
                },
                min_length: 3,
            });

            $('#upline_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src2,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);
                           
                        }
                    });
                },
                min_length: 3,
            });

            $('#bankName').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: bank,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);
                           
                        }
                    });
                },
                min_length: 3,
            });

        });
    </script>