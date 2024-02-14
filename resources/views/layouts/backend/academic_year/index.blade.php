@extends('layouts.backend')
@section('title', 'Academic Year')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				{{ __('Academic Session') }}
				<a class="btn btn-main btn-sm ajax-modal" data-title="{{ __('Add Academic Year') }}" href="{{ route('academic_years.create') }}">{{ __('Add Session') }}</a>
			</div>

			<div class="card-body">
				@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				@endif

				<table class="table table-striped table-hover data-table">
					<thead>
						<tr>
							<th>{{ __('Session Name') }}</th>
							<th>{{ __('Academic Year') }}</th>
							<th>{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
						@php $current = get_option('academic_year'); @endphp
						@foreach ($academicYears as $academicyear)
						<tr id="row_{{ $academicyear->id }}">
							<td class='session'>{{ $academicyear->session }} {{ $academicyear->id == $current ? '(Active)' : '' }}</td>
							<td class='year'>{{ $academicyear->year }}</td>
							<td>
								<form action="{{ route('academic_years.destroy', $academicyear['id']) }}" method="post">
									<a href="{{ route('academic_years.show', $academicyear['id']) }}" data-title="{{ __('View Academic Year') }}" class="btn btn-success btn-sm ajax-modal">
										<ion-icon name="eye"></ion-icon>
									</a>
									<a href="{{ route('academic_years.edit', $academicyear['id']) }}" data-title="{{ __('Update Academic Year') }}" class="btn btn-warning btn-sm ajax-modal">
										<ion-icon name="create"></ion-icon>
									</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">
										<ion-icon name="trash"></ion-icon>
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection