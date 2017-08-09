@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-2 col-sm-4 pull-right">
		<h5>
			<a href="{{ url(route('pin.create')) }}" class="btn-block btn btn-success"><i class="ti-pin-alt"></i> Pesan</a>
		</h5>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="content">
					<table class="table table-responsive table-stripped" id="data-pin" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Pemesan</th>
								<th>Jumlah Pin</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop