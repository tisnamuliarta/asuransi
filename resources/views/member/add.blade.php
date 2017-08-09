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
		</div>
	</div>
@stop