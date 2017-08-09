@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="text-center">
							Buat Setoran
						</h3>
					</div>
					<div class="panel-body">

						{!! Form::open(['url' => route('datasetoran.store'), 'class' => 'form-horizontal', 'files' => true]) !!}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group"><label for="totalSetoran" class="control-label">Total Setoran</label></div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Rp. </span>
											<input type="text" class="form-control" name="totalSetoran" value="{{ old('totalSetoran') }}">
										</div>
										@if ($errors->has('totalSetoran'))
											<span class="text-danger">
												<strong>{{ $errors->first('totalSetoran') }}</strong>
											</span>
										@endif
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group"><label for="dateSetoran" class="control-label">Tanggal Setoran</label></div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<input type="text" data-date-min-date="now" data-date-min-date="moment" class="datepicker form-control" name="dateSetoran" id="dateSetoran" value="{{ old('dateSetoran') }}">

										@if ($errors->has('dateSetoran'))
											<span class="text-danger">
												<strong>{{ $errors->first('dateSetoran') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group"><label for="image" class="control-label">Upload Bukti Setoran</label></div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<input type="file" name="image" id="image" class="form-control">

										@if ($errors->has('image'))
											<span class="text-danger">
												<strong>{{ $errors->first('image') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group"><label for="" class="control-label"></label></div>
								</div>
								<div class="col-md-8">
									<div class="form-group"><input type="submit" value="Kirim Setoran" class=" pull-right btn btn-primary"></div>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop