@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Member</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{ route('addmember') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>

                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="ex. John Smith" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Sponsor</label>

                            <div class="col-sm-8">
                                <select name="sponsorName" id="sponsorName" class="form-control sponsorName" style="width: 100%;">
                                    <option value="{{ $nullValue }}">Select an Sponsor</option>
                                </select>

                                @if($errors->has('sponsorName'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('sponsorName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Upline</label>

                            <div class="col-sm-8">
                                <select name="uplineName" id="uplineName" class="form-control uplineName" style="width: 100%;">
                                    <option value="{{ $nullValue }}">Select an Upline</option>
                                </select>
                                @if($errors->has('uplineName'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('uplineName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="ex. john@mail.com" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bankName" class="col-sm-2 control-label">Nama Bank</label>

                            <div class="col-sm-8">
                                <select name="bankName" id="bankName" class="form-control select2" style="width: 100%;"></select>
                                {{--<input type="text" name="bank" class="form-control" id="inputEmail3" placeholder="Permata Bank" value="{{ old('bankName') }}">--}}
                                @if($errors->has('bankName'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bankNumber" class="col-sm-2 control-label">Nomer Akun Bank</label>

                            <div class="col-sm-8">

                                <input type="text" name="bankNumber" class="form-control" id="inputEmail3" placeholder="ex. 1010101" value="{{ old('bankNumber') }}">
                                @if($errors->has('bankNumber'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('bankNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                            <div class="col-sm-8">
                                <textarea name="address"  class="form-control" id="inputEmail3" placeholder="St Main Street 100x">{{ old('address') }}</textarea>
                                @if($errors->has('address'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nomer Handphone</label>

                            <div class="col-sm-8">
                                <input type="text" name="phoneNumber" class="form-control" data-inputmask="'mask': '9999-9999-9999'" data-mask value="{{ old('phoneNumber') }}">
                                @if($errors->has('phoneNumber'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Ibu</label>

                            <div class="col-sm-8">
                                <input type="text" name="momName" class="form-control" id="inputEmail3" placeholder="ex. Monalissa" value="{{ old('momName') }}">
                                @if($errors->has('momName'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('momName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Ahli Waris</label>

                            <div class="col-sm-8">
                                <input type="text" name="ahliwaris" class="form-control" id="inputEmail3" placeholder="Daniel" value="{{ old('ahliwaris') }}">
                                @if($errors->has('ahliwaris'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('ahliwaris') }}</strong>
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