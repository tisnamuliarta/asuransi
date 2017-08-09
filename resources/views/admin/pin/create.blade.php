@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<div class="header">
					<h3 class="text-center">
						Form Pesan Pin
					</h3>
					<hr>
				</div>
				<div class="content">
					{!! Form::open(['url' => route('pin.store'), 'role' => 'form']) !!}
						<div class="form-group{{ $errors->has('totalPinOrder') ? ' has-error' : '' }}">
							<div class="row">
								<div class="col-md-5"><label for="totalPinOrder" class="text-black">Jumlah pin yang dipesan :</label></div>
								<div class="col-md-7"><input type="number" class="form-control" name="totalPinOrder" id="totalPinOrder" value="{{ old('totalPinOrder') }}">
									
									@if ($errors->has('totalPinOrder'))
	                  <span class="help-block">
	                      <strong>{{ $errors->first('totalPinOrder') }}</strong>
		                  </span>
		              @endif
								</div>
							</div>
						</div>

						<div class="form-group{{ $errors->has('orderName') ? ' has-error' : '' }}">
							<div class="row">
								<div class="col-md-5"><label for="orderName" class="text-black">Nama Pemesan</label></div>
								<div class="col-md-7"><input type="text" class="form-control" id="sponsor_name" name="orderName" value="{{ old('orderName') }}">

									@if ($errors->has('orderName'))
										<span class="help-block">
											<strong>{{ $errors->first('orderName') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-5"><label for=""></label></div>
								<div class="col-md-7">
									<button type="submit" class="btn btn-success btn-fill pull-right">Buat Pin</button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop