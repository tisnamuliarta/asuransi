@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3">
                <div class="box box-info" style="margin-top: 50px;">
                    <div class="box-header">
                        <div class="box-title">
                            Bonus, {{ Auth::user()->name }}
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Bonus Referensi</th>
                                        <th>Bonus Berbagi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($query)
                                            <td>Rp. {{ $query->bonus_referensi }}</td>
                                            <td>Rp. {{ $query->bonus_berbagi }}</td>
                                        @else
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection