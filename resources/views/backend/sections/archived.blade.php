@extends('layouts.backend')
@section('title', 'Archived Section')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Archived Sections') }}
                </div>
                <div class="card-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ __('Section') }}</th>
                            <th>{{ __('class') }}</th>
                            <th>{{ __('class') }}</th>
                            <th>{{ __('class') }}</th>
                            <th>{{ __('Restore') }}</th>
                            <th>{{ __('Delete') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($sections as $data)
                                <tr>
                                    <td>{{ $data->section_name ?? 'Nil' }}</td>
                                    <td>{{ $data->classes[0]['class_name'] ?? 'Nil'  }} </td>
                                    <td>{{ $data->capacity ?? 'Nil' }} </td>
                                    <td>{{ $data->room_no ?? 'Nil' }} </td>
                                    <td>
                                        <a href="{{ route('restoreSection', $data->id) }}" class="btn btn-success btn-restore">
                                            <ion-icon name="arrow-redo"></ion-icon>
                                            {{ __('Restore') }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('deleteSection', $data->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-remove">
                                                <ion-icon name="trash"></ion-icon>
                                                {{ __('Delete Forever') }}
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
@endsection
