@extends('admin.layouts.app')

@section('admin-style')
    <link rel="stylesheet" href="{{ asset('public/plugins/datepicker/datepicker3.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3>Laporan Berdasarkan Tanggal</h3>
                    <div class="row">
                        <form action="" class="form-harizontal">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Tanggal Setoran</label>

                                    <div class="col-sm-7">
                                        <input type="text" name="dateStart" class="form-control" id="dateStart" placeholder="07/04/2017" value="{{ old('dateSetoran') }}">
                                        @if($errors->has('dateStart'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('dateStart') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Tanggal Setoran</label>

                                    <div class="col-sm-7">
                                        <input type="text" name="dateEnd" class="form-control" id="dateEnd" placeholder="07/04/2017" value="{{ old('dateSetoran') }}">
                                        @if($errors->has('dateEnd'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('dateEdn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<link rel="stylesheet" href="{{ asset('public/css/buttons.dataTables.css') }}">
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('public/js/dataTables.buttons.js') }}"></script>
		<script src="{{ asset('public/vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script data-no-instant src="{{ asset('public/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#dateStart').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
        });
        $('#dateEnd').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
        });
    </script>
@endsection