@extends('layouts.backend')
@section('title', 'Edit Faculties/Divide')
@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Editing') }} {{ $divide->divide_name }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('divides.update', $divide['id']) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label class="control-label" for="divide_name">{{ __('Divide/Faculty Name') }}</label>
                        <input type="text" class="form-control" id="divide_name" name="divide_name" value="{{ $divide->divide_name }}" placeholder="Law, Business, Primary, High School" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="divide_rank">{{ __('Divide/Faculty Rank') }}</label>
                        <input type="number" class="form-control" id="divide_rank" name="divide_rank" value="{{ $divide->divide_rank }}" placeholder="Eg. 001, 002">
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button>
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Faculties/Group List') }}
                </div>
            </div>
            <div class="card-body no-export">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <th>{{ __('Faculy') }}</th>
                        <th>{{ __('Rank ID') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($divides as $divide)
                        <tr>
                            <td>{{ $divide->divide_name }}</td>
                            <td>{{ $divide->divide_rank ?? 'Nil' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center">
                                        <li class="mb-2">
                                            <a href="{{ route('divides.edit', $divide['id']) }}" class="btn btn-warning btn-sm" data-title="{{ __('Edit Faculty/Divide') }}">
                                                {{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('divides.destroy', $divide->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class=" btn btn-danger-light btn-sm btn-archive ">
                                                    {{ __('Archive') }}
                                                </button>
                                            </form>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('divides.delete', $divide['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class=" btn btn-danger btn-sm btn-delete">
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
@endsection('content')
