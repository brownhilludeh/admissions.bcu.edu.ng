@extends('layouts.backend')
@section('title', 'Archived Classes')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        {{ __('Archived Class') }}
      </div>
      <div class="card-body no-export">
        <table class="table table-bordered data-table">
          <thead>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Slogan') }}</th>
            <th>{{ __('Restore') }}</th>
            <th>{{ __('Delete') }}</th>
          </thead>
          <tbody>
            @foreach ($classes as $data)
            <tr>
              <td>{{ $data->class_name }}</td>
              <td>{{ $data->slogan ?? 'Nil' }}</td>
              <td>
                <a href="{{ route('restoreClass', $data->id) }}" class="btn-restore btn btn-success">
                  <ion-icon name="arrow-redo"></ion-icon>
                  {{ __('Restore') }}
                </a>
              </td>
              <td>
                <form action="{{ route('deleteClass', $data->id) }}" method="post">
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