@extends('includes.layout')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('public/plugins/datepicker/datepicker3.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="box box-info" style="margin-top: 50px">
                    <div class="box-header">
                        <h3 class="box-title">Konfirmasi Setoran</h3>
                        <hr>
                    </div>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Setoran</label>

                            <div class="col-sm-8">
                                <input type="text" name="dateSetoran" class="form-control" id="dateSetoran" placeholder="07/04/2017" value="{{ old('dateSetoran') }}">
                                @if($errors->has('dateSetoran'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('dateSetoran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Bukti Setoran <small>Maximal 1 mb</small></label>

                            <div class="col-sm-8">
                                <input type="file" name="file" class="form-control" id="inputEmail3" placeholder="ex. John Smith" value="{{ old('file') }}">
                                @if($errors->has('file'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                        <div class="box-footer">
                            <div class="col-sm-8 col-sm-offset-2">
                                {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script data-no-instant src="{{ asset('public/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#dateSetoran').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
        });
    </script>
@endsection