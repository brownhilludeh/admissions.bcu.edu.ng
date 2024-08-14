@extends('layouts.backend')
@section('title', 'Academic Year')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Academic Session') }}
                </div>
                <a class="btn btn-primary btn-sm ajax-modal float-md-end" data-title="{{ __('Add Academic Year') }}" href="{{ route('academic_years.create') }}">{{ __('Add Session') }}</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>{{ __('Session Name') }}</th>
                            <th>{{ __('Academic Year') }}</th>
                            <th>{{ __('Starts') }}</th>
                            <th>{{ __('Ends') }}</th>
                            <th>{{ __('Active') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $current = get_option('academic_year'); @endphp
                        @foreach ($academicYears as $academicyear)
                        <tr id="row_{{ $academicyear->id }}">
                            <td>{{ $academicyear->session }} {{ $academicyear->id == $current ? '(Active)' : '' }}</td>
                            <td>{{$academicyear->year }}</td>
                            <td>{{ date("D, F j, Y", strtotime($academicyear->starting_date)) }}</td>
                            <td>{{ date("D, F j, Y", strtotime($academicyear->ending_date)) }}</td>
                            <td>
                                @if ( $academicyear->is_active == 1 )
                                <ion-icon name="checkmark-done-circle-outline" class="text-success"></ion-icon>
                                @else
                                <ion-icon name="close-circle-outline" class="text-danger"></ion-icon>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center">
                                        <li class="mb-2">
                                            <a href="{{ route('academic_years.show', $academicyear['id']) }}" data-title="{{ __('View Academic Year') }}" class="btn btn-success btn-sm ajax-modal">
                                                {{ __('View') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="{{ route('academic_years.edit', $academicyear['id']) }}" data-title="{{ __('Update Academic Year') }}" class="btn btn-warning btn-sm ajax-modal">
                                                {{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('academic_years.destroy', $academicyear['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
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
