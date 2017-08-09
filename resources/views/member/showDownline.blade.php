@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="header">
						<h5 class="title">Pin yang anda pesan</h5>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-xs-5">
								<div class="icon-big icon-info text-center">
									<i class="ti-pin-alt"></i>
								</div>
							</div>
							<div class="col-xs-7">
								<a href="{{ url(route('show.pins', Hashids::encode(Auth::user()->id))) }}" class="btn btn-info">Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="header">
						<h5 class="title">Kirim Pesan Pemberitahuan</h5>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-xs-5">
								<div class="icon-big icon-warning text-center">
									<i class="ti-bell"></i>
								</div>
							</div>
							<div class="col-xs-7">
								<a href="{{ url(route('show.pins', Hashids::encode(Auth::user()->id))) }}" class="btn btn-warning btn-fill">Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="header">
						<h5 class="title">Lihat Pohon Jaringan</h5>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-xs-5">
								<div class="icon-big icon-info text-center">
									<i class="ti-pin-alt"></i>
								</div>
							</div>
							<div class="col-xs-7">
								<a href="{{ url(route('show.pins', Hashids::encode(Auth::user()->id))) }}" class="btn btn-info">Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
@stop