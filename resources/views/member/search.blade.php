@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::open(array('url' => route('search.member'), 'class' => 'form-horizontal', 'method' => 'GET', 'role' => 'search')) !!}
					<div class="form-group">
						<div class="col-md-8">
							<input type="search" name="search" id="search" class="form-control" placeholder="Find Member">
						</div>
						<div class="col-md-4">
							<button class="btn btn-primary btn-block" type="submit">Find</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>

			<div class="row">
					@forelse($users as $user)
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a href="{{ url(route('user.show', $user->slug))}}">
										{{ $user->name }}
									</a>
								</div>
								<div class="panel-body">
									{!! Form::open(['url' => route('store.member'), 'method' => 'POST', 'class' => 'form-horizontal']) !!}
									<input type="hidden" name="user_id" value="{{ $user->id }}">
									<button type="submit" class="btn btn-success">Add to your Downline</button>

									{!! Form::close() !!}
								</div>
							</div>
						</div>
					@empty
						<p>No result yet!</p>	
	        @endforelse

					<div class="col-md-12">
						<div class="text-center">
							{{ $users->links() }}
						</div>
					</div>
        </div>
		</div>
	</div>
@stop