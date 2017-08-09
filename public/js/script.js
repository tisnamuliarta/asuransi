$(function() {
    //select banks
    $('.select2').select2({
        placeholder: 'Select an Bank',
        minimumInputLength: 2,
        ajax: {
            url: '/autocomplete/banks',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page
                }
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    }),
                    pagination: {
                        more: (params.page * 10) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) { return markup; }
    });

    // select order name
    $('.order-name').select2({
        minimumInputLength: 1,
       ajax: {
           url: '/autocomplete/member-name',
           dataType: 'json',
           delay: 250,
           processResults: function (data) {
               return {
                   results: $.map(data, function (item) {
                       return {
                           text: item.name,
                           id: item.id
                       }
                   })
               };
           },
           cache: true
       }
    });

    // select 2 sponsor
    $('.sponsorName').select2({
        minimumInputLength: 2,
        ajax: {
            url: '/autocomplete/sponsor',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }

    });

    // select 2 sponsor
    $('.uplineName').select2({
        minimumInputLength: 2,
        ajax: {
            url: '/autocomplete/upline',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }

    });




});