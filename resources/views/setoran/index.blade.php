@extends('includes.layout')

@section('page-style')
	<link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('public/plugins/datatables/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/plugins/datatables/jquery.dataTables_themeroller.css') }}"> --}}
@endsection

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				@if(session('status'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						{{ session('status') }}
					</div>
				@endif
				<div class="box box-info" style="margin-top: 50px;">
					<div class="box-header">
						<h5 class="pull-left text-info">
							**Apabila admin belum
							melakukan konfirmasi terhadap setoran anda, harap melakukan konfirmasi secara manual.
						</h5>
						<a href="{{ route('user.confirmSetoran', Hashids::encode(Auth::user()->id))  }}" class="btn btn-info pull-right">Konfirmasi Setoran</a>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="setoran-table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Bukti setoran</th>
										<th>Tanggal Setoran</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					<div class="box-footer">
						**status pending berarti masih menunggu konfirmasi dari admin
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-script')
	<script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/datatable.js') }}"></script>
@endsection