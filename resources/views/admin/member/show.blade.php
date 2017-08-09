@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-7">
			<div class="card">
				<div class="header">
					<a href="{{ url(route('member.index')) }}" class="btn btn-info btn-fill">
						<i class="ti-arrow-left"></i> Kembali
					</a>
					<h4 class="title text-center">Member Details</h4>
					<hr>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->name }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama Sponsor</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->sponsorName }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama Upline</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->uplineName }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Username</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->username }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Alamat</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->address }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nomer telepon</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->phoneNumber }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama Ibu</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->momName }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama Ahli Waris</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->ahliwaris }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nama Bank</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->bankName }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Nomer Rekening</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->bankNumber }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Pin Code</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->pinCode }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label">Email</label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="{{ $user->email }}" ></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="form-group"><label for="" class="control-label"></label></div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="form-group"><input type="text" class="form-control" value="" ></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-5">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="image">
							<img src="{{ asset('imgs/background.jpg') }}">
						</div>
						<div class="content">
							<div class="author">
								<img src="{{ asset('imgs/user/'.$user->avatar) }}" class="avatar border-white" alt="{{ $user->name }}">
								<h4 class="title">{{ $user->name }}</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="header"></div>
						<div class="content">
							<h4 class="text-center">
								<a href="#" class="btn btn-warning">
									<i class="ti-control-shuffle"></i> Lihat Jaringan Member
								</a>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop