@extends('layouts.backend')
@section('title', 'My Profile')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 mb-2">
      <div class="card">
        <div class="card-header justify-content-between">
          {{ __('Users List') }}

          <select id="user_type" class="custom-select" onchange="showUser(this);">
            <option value="">{{ __('Select One') }}</option>
            <option @if (old('Admin')=='Admin' ) selected @endif value="Admin">{{ __('Admin') }}</option>
            <option @if (old('Librarian')=='Librarian' ) selected @endif value="Librarian">{{ __('Librarian') }}</option>
            <option @if (old('Team')=='Team' ) selected @endif value="Team" disabled>{{ __('Team') }}</option>
            <option @if (old('Applicant')=='Applicant' ) selected @endif value="Student">{{ __('Applicant') }}</option>
          </select>
          {{-- <a href="{{ route('users.create') }}" data-title="{{ __('Add New User') }}" class="btn app-blue ajax-modal">{{ __('Add New User') }}</a> --}}
        </div>
        <div class="card-body">
          <table class="table table-striped table-hover data-table">
            <?php $no = 1; ?>
            <thead>
              <th>{{ __('S/N') }}</th>
              <th>{{ __('Profile') }}</th>
              <th>{{ __('Name') }}</th>
              <th>{{ __('Email') }}</th>
              <th>{{ __('User Type') }}</th>
              <th>{{ __('Action') }}</th>
            </thead>
            <tbody>
              @foreach ($users as $data)
              <tr>
                <td>{{ $no++ }}</td>
                <td>
                  <a href="{{ route('users.show', $data->id) }}" class="ajax-modal">
                    <img src="{{ asset('storage/uploads/' . $data->image) }}" class="table-img" alt="user image">
                  </a>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->user_type }}</td>
                <td>
                  <form action="{{ route('users.destroy', $data->id) }}" method="post">
                    <a href="{{ route('users.edit', $data->id) }}" data-title="{{ __('Edit User Information') }}" class="orange ajax-modal">
                      <ion-icon name="create"></ion-icon>
                    </a>
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="red btn-archive">
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
@endsection

@section('js-script')
<script>
  function showUser(elem) {
            if ($(elem).val() == "") {
                return;
            }
            window.location = "<?php echo url('users/get_users'); ?>/" + $(elem).val();
        }
</script>
@stop