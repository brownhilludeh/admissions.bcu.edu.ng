<!---- Application ---->
<li>
    <a href="{{ route('applicant.index') }}">
        <ion-icon name="folder-open-outline"></ion-icon>
        <span>{{ __('My Application') }}</span>
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
