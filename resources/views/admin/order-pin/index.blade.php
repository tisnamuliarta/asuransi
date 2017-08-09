@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!-- Horizontal Form -->
            @if(session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session('status') }}
                </div>
            @endif
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Pemesanan PIN</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('post-order-pin') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="orderName" class="col-sm-2 control-label">Nama Member</label>

                            <div class="col-sm-8">
                                <select name="orderName" id="orderName" class="form-control order-name" style="width: 100%;">
                                    <option value="">Pilih nama member</option>
                                </select>
                                @if($errors->has('orderName'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('orderName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Order Pin</label>

                            <div class="col-sm-8">
                                <input type="number" name="numOrder" class="form-control" id="inputEmail3" placeholder="10" value="{{ old('numOrder') }}">


                                @if($errors->has('numOrder'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('numOrder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-8 col-sm-offset-2">
                            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('page-script')
    <script data-no-instant src="{{ asset('public/plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script data-no-instant src="{{ asset('public/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script data-no-instant src="{{ asset('public/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script data-no-instant src="{{ asset('public/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('public/js/script.js') }}"></script>
    <script>
        $("[data-mask]").inputmask();
    </script>
@endsection