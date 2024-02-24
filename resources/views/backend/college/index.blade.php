@extends('layouts.backend')
@section('title', ' Colleges')
@section('content')
<div class="container">
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
                            <label class="control-label" for="collegeName">{{ __('College Name') }}</label>
                            <input type="text" class="form-control" id="collegeName" name="college_name" value="{{ old('college_name') }}" placeholder="College Name" required>
                            @error('college_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="dean">{{ __('College Dean') }}</label>
                            <input type="text" class="form-control" id="dean" name="dean" value="{{ old('Dean') }}" placeholder="College Dean" required>
                            @error('dean')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                            <th>{{ __('Dean') }}</th>
                            <th>{{ __('Archive') }}</th>
                        </thead>
                        <tbody>
                            <?php $no =1?>
                            @foreach ($colleges as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->college_name }}</td>
                                <td>{{ $data->dean ?? 'Nil' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>
                                        <ul class="dropdown-menu text-center">
                                            <li class="mb-2">
                                                <a href="{{ route('colleges.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                                    <ion-icon name="create"></ion-icon>{{ __('Edit') }}
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <form action="{{ route('colleges.destroy', $data->id) }}" method="post">
                                                    {{ method_field('DELETE') }}
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger btn-sm btn-archive">
                                                        <ion-icon name="archive"></ion-icon>{{ __('Archive') }}
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
        <div class="col-12 mb-2">
        </div>
    </div>
</div>
@endsection('content')