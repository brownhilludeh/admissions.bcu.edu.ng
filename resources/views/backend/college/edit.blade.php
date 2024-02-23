@extends('layouts.backend')
@section('title', ' Edit Class')
@section('content')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    {{ __('Class Update') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('classes.update', $class->id) }}" class="validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="class_name" class="control-label">{{ __('Name') }}</label>
                                <input type="text" id="class_name" class="form-control" name="class_name" value="{{ $class->class_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="slogan" class="control-label">{{ __('Class Slogan') }}</label>
                                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $class->slogan }}">
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
                    {{ __('Class List') }}
                </div>
                <div class="card-body no-export">
                    <table class="table table-striped table-hover data-table">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Slogan') }}</th>
                            <th>{{ __('Edit') }}</th>
                            <th>{{ __('Archive') }}</th>
                        </thead>
                        <tbody>
                            <?php $no =1?>
                            @foreach ($classes as $data)
                                <tr>
                                    <td>{{ $data->class_name }}</td>
                                    <td>{{ $data->slogan ?? 'Nil' }}</td>
                                    <td>
                                        
                                    </td>
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
