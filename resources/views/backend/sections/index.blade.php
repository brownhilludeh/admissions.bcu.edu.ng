@extends('layouts.backend')
@section('title', 'Sections')
@section('content')
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card">
            <div class="card-header">
                {{ __('Create Section') }}
            </div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" autocomplete="on" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="form-group">
                        <label for="section_name" class="control-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="section_name" required value="{{ old('section_name') }}" id="section_name">
                    </div>

                    <div class="form-group">
                        <label class="control-label" @required(true)>{{ __('Class') }}</label>
                        <select name="class_id" class="form-control select2" @required(true)>
                            <option value="">{{ __('-Select One-') }}</option>
                            {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="control-label">{{ __('Capacity') }}</label>
                        <input type="number" class="form-control" name="capacity" required value="{{ old('capacity') }}" id="capacity">
                    </div>
                    <div class="form-group">
                        <label for="room_no" class="control-label">{{ __('Room No') }}</label>
                        <input type="number" class="form-control" name="room_no" required value="{{ old('room_no') }}" id="room_no">
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
                    {{ create_option('classes', 'id', 'class_name', $class) }}
                </select>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>{{ __('Class Name') }}</th>
                            <th>{{ __('Section Name') }}</th>
                            <th>{{ __('Capacity') }}</th>
                            <th>{{ __('Room') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $data)
                        <tr>
                            <td>{{ $data->class_name }}</td>
                            <td>{{ $data->section_name }}</td>
                            <td>{{ $data->capacity}}</td>
                            <td>{{ $data->room_no}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu text-center">
                                        <li class="mb-2">
                                            <a href="{{ route('sections.edit', $data->id) }}" data-title="{{ __('Edit Section') }}" class="btn-warning btn btn-sm ajax-modal">
                                                {{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{ route('sections.destroy', $data->id) }}" method="post">
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
@endsection('content')

@section('js-script')
<script>
    function showClass(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('sections/class'); ?>/" + $(elem).val();
        }
</script>
@stop