@extends('admin.layouts.app')

@section('admin-style')
	<link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection


@section('content')
	@if(session('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			{{ session('status') }}
		</div>
	@endif
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title">Data Setoran Member</h3>
		</div>
		<div class="box-body">

			<div class="table-responsive">
				<table id="setoran-table" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Member</th>
						<th>Bukti setoran</th>
						<th>Tanggal Setoran</th>
						<th>Status</th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('page-script')
	<script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/admin-datatable.js') }}"></script>
@endsection