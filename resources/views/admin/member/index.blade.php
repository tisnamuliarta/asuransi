@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-12 text-center center-content">
			<a href="{{ url(route('member.create')) }}" class="btn btn-success">Buat Member Baru</a>
			<span>&nbsp;</span>
			<a href="{{ url(route('member.create')) }}" class="btn btn-primary btn-fill">Punya pin?, Buat Member Baru</a>
		</div>

	<div class="col-md-12">
		<div class="card">
			<div class="content">
				<table class="table table-striped" id="users-table">
					<thead>
						<tr>
							<th>id</th>
							<th>Sponsor Name</th>
							<th>Upline Name</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	</div>
@stop