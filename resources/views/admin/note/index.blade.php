@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h3>New Member Username and Password</h3>
				</div>
				<div class="content table-responsive">
					<table class="table table-striped" id="note-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Pin Code</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($notes as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td><input type="text" name="username" value="{{ $user->username }}" class="form-control" disabled="1"></td>
									<td><input type="text" name="pinCode" id="pinCode" value="{{ $user->pinCode }}" class="form-control" disabled="1"></td>

									<input type="hidden" name="password" value="{{ $user->password }}">
									
									<td>
										<a href="{{ url(route('admin.note.sendmail')) }}" class="btn btn-success">
											<i class="ti-email"></i>
										</a>
										<a href="{{ url(route('admin.note.delete')) }}" class="btn btn-warning">
											<i class="ti-trash"></i>
										</a>
									</td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop