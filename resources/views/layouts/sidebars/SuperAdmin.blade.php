{{-- Students --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="people-outline"></ion-icon>
    <span>{{ __('Applicants') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('students.index') }}">
        {{ __('Applicants') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedStudent') }}">
        {{ __('Archived Applicant') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('Waiting List') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('Admission List') }}
      </a>
    </li>
  </ul>
</li>
{{-- Academics --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="school-outline"></ion-icon>
    <span>{{ __('Academics') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ route('academic_years.index') }}">
        {{ __('Academic year') }}
      </a>
    </li>
    <li>
      <a href="{{ url('classes.index') }}">
        {{ __('Classes') }}
      </a>
    </li>
    <li>
      <a href="{{ url("sections.index") }}">
        {{ __('Sections') }}
      </a>
    </li>
    <li>
      <a href="{{ url("subjects.index") }}">
        {{ __('Subjects') }}
      </a>
    </li>
  </ul>
</li>
{{-- Students --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="people-outline"></ion-icon>
    <span>{{ __('User Accounts') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('students.index') }}">
        {{ __('All users') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedStudent') }}">
        {{ __('Active Users') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('Inative Users') }}
      </a>
    </li>
  </ul>
</li>
{{-- Colleges --}}
<li>
  <a href="{{ route('colleges.index') }}">
    <ion-icon name="layers-outline"></ion-icon>
    <span>{{ __("Colleges") }}</span>
  </a>
</li>
{{-- Colleges --}}
<li>
  <a href="{{ route('programmes.index') }}">
    <ion-icon name="layers-outline"></ion-icon>
    <span>{{ __("Programmes") }}</span>
  </a>
</li>
{{-- Setting --}}
<li>
  <a href="{{ route('general_settings') }}">
    <ion-icon name="settings-outline"></ion-icon>
    <span>{{ __('General Settings') }}</span>
  </a>
</li>
{{-- DB --}}
<li>
  <a href="{{ route('db.backup') }}">
    <ion-icon name="layers-outline"></ion-icon>
    <span>{{ __("Backup Database") }}</span>
  </a>
</li>