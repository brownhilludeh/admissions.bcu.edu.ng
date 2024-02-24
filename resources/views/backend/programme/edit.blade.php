@extends('layouts.backend')
@section('title', 'Prgrammerss')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Create Section') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('programmes.update', $programme->id) }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ __('Programme Name') }}</label>
                                <input type="text" class="form-control" name="programme_name" value="{{ $programme->programme_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ __('College') }}</label>
                                <select name="class_id" class="form-control select2" required>
                                    <option value="">{{ __('Select One') }}</option>
                                    {{ create_option('colleges', 'id', 'college_name', $programme->college_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hod" class="control-label">{{ __('Head of Department') }}</label>
                            <input type="text" class="form-control" name="hod" value="{{ $programme->hod }}" id="hod">
                        </div>
                        <div class="form-group">
                            <label for="capacity" class="control-label">{{ __('Capacity') }}</label>
                            <input type="number" class="form-control" name="capacity" required value="{{ $programme->capacity }}" id="capacity">
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-main btn-sm">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-between">
                    {{ __('Programme List') }}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover data-table">
                        <thead>
                            <tr>
                                <th>{{ __('S/N') }}</th>
                                <th>{{ __('Programme Name') }}</th>
                                <th>{{ __('College Name') }}</th>
                                <th>{{ __('Capacity') }}</th>
                                <th>{{ __('Dean') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($programmes as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->programme_name }}</td>
                                <td>{{ $data->colleges[0]['college_name'] }}</td>
                                <td>{{ $data->capacity}}</td>
                                <td>{{ $data->hod}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>
                                        <ul class="dropdown-menu text-center">
                                            <li class="mb-2">
                                                <a href="{{ route('programmes.edit', $data->id) }}" data-title="{{ __('Edit Section') }}" class="btn-warning btn btn-sm">
                                                    {{ __('Edit') }}
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <form action="{{ route('programmes.destroy', $data->id) }}" method="post">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="submit" class="btn-danger btn btn-sm btn-archive">
                                                        {{ __('Archive') }}
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
</div>
@endsection('content')

@section('js-script')
<script>
    function showClass(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('programmes/college'); ?>/" + $(elem).val();
        }
</script>
@stop