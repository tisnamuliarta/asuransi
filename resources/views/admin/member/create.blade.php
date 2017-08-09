@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="card">
				<div class="header">
					<h3 class="text-center title">Generate New Member</h3>
					<hr>
				</div>
				<div class="content">
					{!! Form::open(['url' => route('member.store')]) !!}

						<div class="form-group {{ $errors->has('sponsor_name') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="sponsor_name" class="control-label">Nama Sponsor</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="sponsor_name" id="sponsor_name" class="form-control" value="{{ old('sponsor_name') }}">
								 @if ($errors->has('sponsor_name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('sponsor_name') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('upline_name') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="upline_name">Nama Upline</label>
							</div>
							<div class="col-md-8">
								<input type="text" value="{{ old('upline_name') }}" name="upline_name" class="form-control" id="upline_name">

								@if ($errors->has('upline_name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('upline_name') }}</strong>
	                    </span>
	                @endif
							</div>
						</div>

						
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="name">Nama Lengkap</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
								 @if ($errors->has('name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

{{-- 						<div class="form-group">
							<div class="col-md-4">
								<label for="name">Tempat, Tanggal Lahir</label>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-5">
										<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
									 	@if ($errors->has('tempat_lahir'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
		                    </span>
		                @endif
									</div>
									<div class="col-md-7">
										<input type="text" class="form-control" data-date-min-date="now" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
										 @if ($errors->has('tanggal_lahir'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
			                    </span>
			                @endif
									</div>
								</div>
              </div>
						</div> --}}

						<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="username">username</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
								 @if ($errors->has('username'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('username') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="address">Alamat</label>
							</div>
							<div class="col-md-8">
							<textarea name="address" class="form-control" id="address">{{old('address')}}</textarea>
								 @if ($errors->has('address'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('address') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="phone_number">Nomer HP</label>
							</div>
							<div class="col-md-8">
							<input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control">
								 @if ($errors->has('phone_number'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('phone_number') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('momName') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="momName">Nama Ibu Kandung</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="momName" id="momName" value="{{ old('momName') }}">
								 @if ($errors->has('momName'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('momName') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('ahliwaris') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="ahliwaris">Nama Ahli Waris</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="ahliwaris" id="ahliwaris" value="{{ old('ahliwaris') }}">
								 @if ($errors->has('ahliwaris'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('ahliwaris') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>
						<div class="form-group {{ $errors->has('bankName') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="bankName">Nama Bank</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="bankName" id="bankName" value="{{ old('bankName') }}">
								 @if ($errors->has('bankName'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('bankName') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('bankNumber') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="bankNumber">Nomer Rekening</label>
							</div>
							<div class="col-md-8">
							<input type="text" class="form-control" name="bankNumber" id="bankNumber" value="{{ old('bankNumber') }}">
								 @if ($errors->has('bankNumber'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('bankNumber') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="col-md-4">
								<label for="email">Alamat Email</label>
							</div>
							<div class="col-md-8">
							<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
								 @if ($errors->has('email'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
                </div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-8">
									<button type="submit" class="btn btn-info btn-fill btn-wd pull-right" style="margin-right: 15px;">Buat Member Baru</button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop