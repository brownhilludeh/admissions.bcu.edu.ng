<!---- Academics ---->
<li class="sidebar-submenu">
    <a href="#" class="sidebar-menu-dropdown">
        <ion-icon name="school-outline"></ion-icon>
        <span>{{ __('Academics') }}</span>
        <div class="dropdown-icon"></div>
    </a>
    <ul class="sidebar-menu sidebar-menu-dropdown-content">
        <li>
            <a href="{{ route('classes.index') }}">
                {{ __('Programmes') }}
            </a>
        </li>
        <li>
            <a href="{{ route('divides.index') }}">
                {{ __('Colleges') }}
            </a>
        </li>
        <li>
            <a href="{{ route('academic_years.index') }}">
                {{ __('Academic year') }}
            </a>
        </li>
    </ul>
</li>
<!---- Applicants ---->
<li>
    <a href="{{ route('applicants.index') }}">
        <ion-icon name="folder-open-outline"></ion-icon>
        <span>{{ __('Applicants') }}</span>
    </a>
</li>
<!---- Messages ---->
<li class="sidebar-submenu">
    <a href="#" class="sidebar-menu-dropdown">
        <ion-icon name="chatbubbles-outline"></ion-icon>
        <div>{{ __('Message') }}
            <span class="position-absolute top-50 start-50 text-small translate-middle badge rounded-pill bg-danger">
                {{ count_inbox() }}
            </span>
        </div>
        <div class="dropdown-icon"></div>
    </a>
    <ul class="sidebar-menu sidebar-menu-dropdown-content">
        <li>
            <a href="{{ route('msg_compose') }}">
                {{ __('Compose') }}
            </a>
        </li>
        <li>
            <a href="{{ route('msg_inbox') }}">
                {{ __('Inbox') }}
            </a>
        </li>
        <li>
            <a href="{{ route('msg_outbox') }}">
                {{ __('Outbox') }}
            </a>
        </li>
    </ul>
</li>
<!---- Email ---->
<li class="sidebar-submenu">
    <a href="#" class="sidebar-menu-dropdown">
        <ion-icon name="mail-outline"></ion-icon>
        <span>{{ __('Email') }}</span>
        <div class="dropdown-icon"></div>
    </a>
    <ul class="sidebar-menu sidebar-menu-dropdown-content">
        <li>
            <a href="{{ route('emails.create') }}">
                {{ __('Compose') }}
            </a>
        </li>
        <li>
            <a href="{{ route('emails.index') }}">
                {{ __('Email Log') }}
            </a>
        </li>
    </ul>
</li>
<!---- Archived ---->
<li class="sidebar-submenu">
    <a href="#" class="sidebar-menu-dropdown">
        <ion-icon name="people-outline"></ion-icon>
        <span>{{ __('Users') }}</span>
        <div class="dropdown-icon"></div>
    </a>
    <ul class="sidebar-menu sidebar-menu-dropdown-content">
        <li>
            <a href="{{ route('users.index') }}">
                {{ __('Users') }}
            </a>
        </li>
        <li>
            <a href="{{ route('emails.index') }}">
                {{ __('Email Log') }}
            </a>
        </li>
    </ul>
</li>
<!---- Archived ---->
<li class="sidebar-submenu">
    <a href="#" class="sidebar-menu-dropdown">
        <ion-icon name="archive-outline"></ion-icon>
        <span>{{ __('Archived') }}</span>
        <div class="dropdown-icon"></div>
    </a>
    <ul class="sidebar-menu sidebar-menu-dropdown-content">
        <li>
            <a href="{{ route('applicants.archived') }}">
                {{ __('Applicants') }}
            </a>
        </li>
        <li>
            <a href="{{ route('emails.index') }}">
                {{ __('Email Log') }}
            </a>
        </li>
    </ul>
</li>

<!---- Settings ---->
<li>
    <a href="{{ route('general_settings') }}">
        <ion-icon name="settings-outline"></ion-icon>
        <span>{{ __('General Settings') }}</span>
    </a>
</li>
<!---- Backup ---->
<li>
    <a href="{{ route('db.backup') }}">
        <ion-icon name="layers-outline"></ion-icon>
        <span>{{ __("Backup Database") }}</span>
    </a>
</li>
