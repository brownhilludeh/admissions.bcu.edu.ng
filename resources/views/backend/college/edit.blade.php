@extends('layouts.backend')
@section('title', ' Edit Class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    {{ __('colleg Update') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('colleges.update', $college->id) }}" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="college_name" class="control-label">{{ __('College Name') }}</label>
                                <input type="text" id="college_name" class="form-control" name="college_name" value="{{ $college->college_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="dean" class="control-label">{{ __('College Dean') }}</label>
                                <input type="text" class="form-control" id="dean" name="dean" value="{{ $college->dean }}">
                            </div>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-main">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('colleg List') }}
                    <a href="{{ route('colleges.index') }}" class="btn btn-main">Add Colleges</a>
                </div>
                <div class="card-body no-export">
                    <table class="table table-striped table-hover data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('dean') }}</th>
                            <th>{{ __('Edit') }}</th>
                            <th>{{ __('Archive') }}</th>
                        </thead>
                        <tbody>
                            <?php $no =1?>
                            @foreach ($colleges as $data)
                            <tr>
                                <td>{{ $data->college_name }}</td>
                                <td>{{ $data->dean ?? 'Nil' }}</td>
                                <td>

                                </td>
                                <td>
                                    <form action="{{ route('colleges.destroy', $data->id) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <a href="{{ route('colleges.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                            <ion-icon name="create"></ion-icon>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm btn-archive">
                                            <ion-icon name="archive"></ion-icon>
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
</div>
@endsection('content')