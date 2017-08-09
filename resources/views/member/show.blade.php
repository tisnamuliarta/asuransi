@extends('includes.layout')

@section('content')
	<div class="container">
		
		<h1>Downline, {{ $user->name }}</h1>
	</div>
	<div class="downline-content" style="height: 700px !important;
  width: 1300px !important; margin: 0 auto;
  border:2px solid #000;
  overflow: scroll !important;">

	</div>
@endsection

@section('page-script')
	<script src="{{ asset('public/js/d3/v3/d3.min.js') }}"></script>
	<script>
			var downlineUrl = '{{ route('tree-user', encrypt(Auth::user()->id)) }}';

	</script>
	<script src="{{ asset('public/js/tree.js') }}"></script>

@endsection