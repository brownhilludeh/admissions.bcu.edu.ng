@extends('layouts.backend')
@section('title', ' Edit Class')
@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                {{ __('Edit Progamme') }}
            </div>
            <div class="card-body">
                <form action="{{ route('classes.update', $class->id) }}" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="card-body">
                        <form action="{{ route('classes.store') }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="className">{{ __('Class Name') }}</label>
                                <input type="text" class="form-control" id="className" name="class_name" value="{{ $class->class_name }}" placeholder="Class Name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="slogan">{{ __('Class Slogan') }}</label>
                                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $class->slogan }}" placeholder="Class Slogan">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ __('Faculty/Divide') }}</label>
                                <select name="divide_id" class="form-control select2" required>
                                    <option value="">{{ __('Select One') }}</option>
                                    {{ create_option('divides', 'id', 'divide_name', $class->divide_id) }}
                                </select>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <button type="reset" class="btn btn-danger btn-sm">{{ __('Reset') }}</button>
                                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Class List') }}
            </div>
            <div class="card-body no-export">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('College') }}</th>
                        <th>{{ __('Slogan') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr>
                            <td>{{ $class->class_name }}</td>
                            <td>{{ $class->divide->divide_name ?? 'N/A or deleted' }}</td>
                            <td>{{ $class->slogan?? 'Nil' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center">
                                        <li class="mb-2">
                                            <a href="{{ route('classes.edit', $class['id']) }}" class="btn btn-warning btn-sm ajax-modall" data-title="{{ __('Edit Faculty/Divide') }}">
                                                {{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('classes.destroy', $class['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class=" btn btn-danger-light btn-sm btn-archive">
                                                    {{ __('Archive') }}
                                                </button>
                                            </form>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('classes.delete', $class['id']) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class=" btn btn-danger btn-sm btn-delete ">
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
