@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<div class="header" style="display: flex; flex-direction: column; align-items: center;">
						<div class="avatar">
							<img class="img-circel img-responsive " src="{{ asset('imgs/user/'.$user->avatar) }}">
						</div>
					</div>
					<div class="content">
						<h3 class="title">{{ $user->name }}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop