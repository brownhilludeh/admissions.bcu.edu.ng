@extends('layouts.backend')
@section('title', 'View Academic Session')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
					{{ __('View Academic Session') }}
				</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>{{ __('Session') }}</td>
                            <td>{{ $academicYear->session }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Year') }}</td>
                            <td>{{ $academicYear->year }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
