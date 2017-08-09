@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('status') }}
                    </div>
                @endif
                <div class="box box-info" style="margin-top: 50px">
                    <div class="box-header">
                        <h3 class="box-title">Kirim Pesan Order Pin</h3>
                        <hr>
                    </div>

                    <form class="form-horizontal" action="{{ route('post-order-messages', Hashids::encode(Auth::user()->id)) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="dateSetoran" class="col-sm-3 control-label">Jumlah Order Pin</label>

                                <div class="col-sm-8">
                                    <input type="number" name="totalOrder" class="form-control" id="dateSetoran" value="{{ old('totalOrder') }}">
                                    @if($errors->has('totalOrder'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('totalOrder') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>

                                <div class="col-sm-8">
                                    <textarea name="keterangan" id="keterangan"  class="form-control" rows="5">{{ old('keterangan') }}</textarea>
                                    @if($errors->has('keterangan'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('keterangan') }}</strong>
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