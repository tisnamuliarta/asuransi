@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel">
					<div class="panel-heading">
						<h3>Details setoran {{ Auth::user()->name}}</h3>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group"><label for="" class="control-label">Nama</label></div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									{{ $setoran->user->name }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group"><label for="" class="control-label">Tanggal Setor</label></div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									{{ $setoran->dateSetoran }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group"><label for="" class="control-label">Total Setoran</label></div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<strong>Rp. </strong>{{ $setoran->totalSetoran}}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group"><label for="" class="control-label">Bukti Setoran</label></div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<img src="{{ asset('storage/images/'.$setoran->images) }}" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- expr --}}
@stop