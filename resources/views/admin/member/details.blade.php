@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="header">
					<h2>User Details</h2>
				</div>
				<div class="content">
					{!! Form::open(['class' => 'form-horizontal']) !!}
							<div class="user-detail">
								<div class="row">
									<div class="col-md-5">Name</div>
									<div class="col-md-7">
										<input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
									</div>
								</div>
							</div>
							<div class="user-detail">
								<div class="row">
									<div class="col-md-5">username</div>
									<div class="col-md-7">
										<input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
									</div>
								</div>
							</div>
			
							@if (session('password'))
								<div class="user-detail">
									<div class="row">
										<div class="col-md-5">password</div>
										<div class="col-md-7">
											<input type="text" name="password" class="form-control" value="{{ session('password') }}" disabled>
										</div>
									</div>
								</div>
							@endif

							<div class="form-group">
								<input type="submit" name="submit" value="Save to note" class="btn btn-success btn-block">
							</div>

					{!! Form::close() !!}



				</div>
			</div>
		</div>
	</div>
@stop