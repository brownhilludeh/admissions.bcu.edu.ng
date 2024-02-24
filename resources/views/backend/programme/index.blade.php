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
                    <form action="{{ route('programmes.store') }}" autocomplete="on" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label for="programme_name" class="control-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="programme_name" required value="{{ old('programme_name') }}" id="programme_name">
                        </div>

                        <div class="form-group">
                            <label class="control-label" @required(true)>{{ __('Class') }}</label>
                            <select name="college_id" class="form-control select2" @required(true)>
                                <option value="">{{ __('-Select One-') }}</option>
                                {{ create_option('colleges', 'id', 'college_name', old('college_id')) }}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hod" class="control-label">{{ __('Head of Department') }}</label>
                            <input type="text" class="form-control" name="hod" value="{{ old('hod') }}" id="hod">
                        </div>
                        <div class="form-group">
                            <label for="capacity" class="control-label">{{ __('Capacity') }}</label>
                            <input type="number" class="form-control" name="capacity" required value="{{ old('capacity') }}" id="capacity">
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{ __('Reset') }}</button>
                            <button type="submit" class="btn btn-main btn-sm">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-between">
                    {{ __('Section List') }}
                    <select class="custom-select  btn-sm" id="class" onchange="showClass(this);">
                        <option value=""> {{ __('Select Class') }} </option>
                        {{ create_option('colleges', 'id', 'college_name', $college) }}
                    </select>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover data-table">
                        <thead>
                            <tr>
                                <th>{{ __('Programme Name') }}</th>
                                <th>{{ __('College Name') }}</th>
                                <th>{{ __('Capacity') }}</th>
                                <th>{{ __('Room') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programmes as $data)
                            <tr>
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