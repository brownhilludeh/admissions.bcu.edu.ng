{{-- Students --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="people-outline"></ion-icon>
    <span>{{ __('Students') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('students.index') }}">
        {{ __('Student') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedStudent') }}">
        {{ __('Archived Students') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('All Students') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('Current Students') }}
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
{{-- Marks --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="checkmark-done-circle-outline"></ion-icon>
    <span>{{ __('Marks') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('marks.create') }}">
        {{ __('Enter Scores') }}
      </a>
    </li>
    <li>
      <a href="{{ url('grades.index') }}">
        {{ __('Grades') }}
      </a>
    </li>
    <li>
      <a href="{{ url('mark_distributions.index') }}">
        {{ __('Mark Distribution') }}
      </a>
    </li>
  </ul>
</li>
{{-- Examination --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="document-text-outline"></ion-icon>
    <span>{{ __('Examination') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('exams.index') }}">
        {{ __('Exam Term') }}
      </a>
    </li>
    <li>
      <a href="{{ url('exams/schedule/create') }}">
        {{ __('Schedule Exam') }}
      </a>
    </li>
    <li>
      <a href="{{ url('exams.archive') }}">
        {{ __('Archived Exam') }}
      </a>
    </li>
  </ul>
</li>
{{-- Cbt --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="laptop-outline"></ion-icon>
    <span>{{ __('Online exams') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('cbts.index') }}">
        {{ __('Set CBT') }}
      </a>
    </li>
    <li>
      <a href="{{ url('Question') }}">
        {{ __('Set CBT Q & A') }}
      </a>
    </li>
    <li>
      <a href="{{ url('questions.index') }}">
        {{ __('CBT Question Bank') }}
      </a>
    </li>
  </ul>
</li>
{{-- Teacehrs --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="people-circle-outline"></ion-icon>
    <span>{{ __('Teachers') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('teachers.index') }}">
        All Teachers
      </a>
    </li>
    <li>
      <a href="{{ url('archivedTeacher') }}">
        Archived Teachers
      </a>
    </li>
  </ul>
</li>
{{-- Archive --}}
<li class="sidebar-submenu">
  <a href="#" class="sidebar-menu-dropdown">
    <ion-icon name="arrow-redo-outline"></ion-icon>
    <span>{{ __('Archived Files') }}</span>
    <div class="dropdown-icon"></div>
  </a>
  <ul class="sidebar-menu sidebar-menu-dropdown-content">
    <li>
      <a href="{{ url('archivedClass') }}">
        {{ __('Archived Classes') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSection') }}">
        {{ __('Archived Sections') }}
      </a>
    </li>
    <li>
      <a href="{{ url('archivedSubject') }}">
        {{ __('Archived Subjects') }}
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
{{-- Setting --}}
<li>
  <a href="{{ route('general_settings') }}">
    <ion-icon name="settings-outline"></ion-icon>
    <span>{{ __('General Settings') }}</span>
  </a>
</li>
{{-- DB --}}
<li>
  <a href="{{ url('db.backup') }}">
    <ion-icon name="layers-outline"></ion-icon>
    <span>{{ __("Backup Database") }}</span>
  </a>
</li>