@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					{{-- <h4>{{ $pinOrder->user->name }}'s Details Order</h4> --}}
					{{-- <input type="hidden" name="user_id" value="{{ $pinOrder->user_id }}"> --}}
					<hr>
				</div>
				<div class="content table-responsive">
					<table class="table table-stripped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nama User</th>
									<th>Kode Pin</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pinOrder as $pinOrder)
									<tr>
										<td>{{ $pinOrder->id }}</td>
										<td>{{ $pinOrder->user_id }}</td>
										{{-- <td>{{ $pinOrder->pinCodes->pinCode }}</td> --}}
									</tr>
								@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>
@stop