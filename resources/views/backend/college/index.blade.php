@extends('layouts.backend')
@section('title', ' Classes')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Class') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('colleges.store') }}" autocomplete="on" class="form-horizontal validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="className">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="className" name="class_name" value="{{ old('class_name') }}" placeholder="Class Name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="slogan">{{ __('Class Slogan') }}</label>
                            <input type="text" class="form-control" id="slogan" name="slogan" value="{{ old('slogan') }}" placeholder="Slogan">
                        </div>
                        <hr>
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
                <div class="card-header">
                    {{ __('Class List') }}
                </div>
                <div class="card-body no-export">
                    <table class="table table-striped table-hover data-table">
                        <thead>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Slogan') }}</th>
                            <th>{{ __('Archive') }}</th>
                        </thead>
                        <tbody>
                            <?php $no =1?>
                            @foreach ($colleges as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->class_name }}</td>
                                    <td>{{ $data->slogan ?? 'Nil' }}</td>
                                    <td>
                                        <form action="{{ route('classes.destroy', $data->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <a href="{{ route('classes.edit', $data->id) }}" class="btn btn-warning btn-sm">
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
@endsection('content')
