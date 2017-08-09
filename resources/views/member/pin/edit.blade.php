@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card shadow">
					<div class="header">
						<a href="{{ url(route('show.pins', Hashids::encode(Auth::user()->id))) }}" class="btn btn-sm btn-warning btn-fill"><i class="ti-arrow-left"></i> Back</a>
						<h3 class="text-center">Edit Pin</h3>
						<hr>
					</div>
					<div class="content">
						{!! Form::open(['url' => route('editpin.store', Hashids::encode($user->id)), 'method' => 'PATCH']) !!}
							<input type="hidden" name="sponsor_name" id="sponsor_name" value="{{ $sponsor->name }}">
							<input type="hidden" name="kodePin" id="kodePin" value="{{ $user->pinCode }}">
							<div class="form-group">
								<div class="col-md-4">
									<label for="pinCode" class="control-label">Kode PIN</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="pinCode" id="pinCode" class="form-control" value="{{ $user->pinCode }}" disabled="1">
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
	</div>
@stop