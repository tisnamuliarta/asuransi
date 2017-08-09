<script type="text/javascript" data-turbolinks-track="reload">
		function deleteSetoran() {
		swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this imaginary file!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, delete it!",
			  cancelButtonText: "No, cancel plx!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    swal("Deleted!", "Your imaginary file has been deleted.", "success");
			  } else {
			    swal("Cancelled", "Your imaginary file is safe :)", "error");
			  }
			});
	}

    $(document).ready(function() {
        $.ajax({
          url: '{{ route('test123') }}',
          dataType: 'json',
          success: function (response) {
            var arry = [response];
            var r = convert(arry);
            console.log(r);
          }
        });

        function convert(array) {
          var map = {};
          for (var i = 0; i < array.length; i++) {
            var obj = array[i];
            obj.items = [];
            map[obj.id] = obj;

            var parent = obj.parent_id || '-';
            if(!map[parent]) {
              map[parent] = {
                items: []
              };
            }
            map[parent].items.push(obj);
          }
          return map['-'].items;
        }

        $('#upline_name').autocomplete({
          source: function(request, response) {
              $.ajax({
                  url: '{{ route('upline.autocomplete')}}',
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
                url: '{{ route('bankmember.autocomplete') }}',
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


    	// change active
      var url = window.location;
      $('ul.nav li a[href="' + url + '"]' ).parent().addClass('active');
    	// datetime picker
    	// data pin
    	$('#pin_member').DataTable({
    		processing: true,
    		serverSide: true,
    		ajax: '{!! url('/member/getdatapin/'.Hashids::encode(Auth::user()->id)) !!}',
    		columns: [
    			{ data: 'NO', name: 'NO' },
    			{ data: 'pinCode', name: 'pinCode' },
    			{ data: 'status', name: 'status' },
    			{ data: 'action', name: 'action' }
    		]
    	});

  		// data setoran
      $('#setoran-member').DataTable({
      	processing: true,
      	serverSide: true,
      	ajax: '{!! route('getDataSetoran') !!}',
      	columns: [
      		{ data: 'id', name: 'id' },
      		{ data: 'dateSetoran', name: 'dateSetoran' },
      		{ data: 'totalSetoran', name: 'totalSetoran' },
      		{ data: 'action', name: 'action', searchable: false, orderable: false },
      	]
      });
    });
</script>