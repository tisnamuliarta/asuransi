@extends('includes.layout')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/plugins/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/jquery.dataTables_themeroller.css') }}"> --}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('status') }}
                    </div>
                @endif
                <div class="box box-info" style="margin-top: 50px;">
                    <div class="box-header">
                        <h5 class="pull-left text-info">
                            **Apabila admin belum
                            melakukan konfirmasi terhadap setoran anda, harap melakukan konfirmasi secara manual.
                        </h5>
                        <a href="{{ url('/tambah-downline', Hashids::encode(Auth::user()->id))  }}" class="btn btn-info pull-right">Tambah Downline</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="downline-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Avatar</th>
                                    <th>Nama</th>
                                    <th>Sponsor</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        **status pending berarti masih menunggu konfirmasi dari admin
                    </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/datatable.js') }}"></script>
    <script>
        $(function () {
            var url = window.location.href;
            var id = url.substring(url.lastIndexOf('#') + 1);
            console.log(id);
            $('#downline-table').DataTable({
                "processing" : true,
                "serverSide" : true,
                "ajax" : {
                    "url" : id
                },
                "columns": [
                    { data: 'rownum', name: 'rownum' },
                    { data: 'avatar', name: 'avatar' },
                    { data: 'name', name: 'name' },
                    { data: 'sponsor', name: 'sponsor' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>

@endsection