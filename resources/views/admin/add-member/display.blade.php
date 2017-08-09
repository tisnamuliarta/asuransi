@extends('admin.layouts.app')

@section('admin-style')
	<link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title">List Member</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="member-table" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Images</th>
						<th >Name</th>
						<th>Email</th>
						<th>Pin Code</th>
						<th>Upline Name</th>
						<th>Sponsor Name</th>
						<th>Address</th>
						<th>Phone Number</th>
						<th>Mom Name</th>
						<th>Heir Name</th>
						<th>Bank Name</th>
						<th>Action</th>
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