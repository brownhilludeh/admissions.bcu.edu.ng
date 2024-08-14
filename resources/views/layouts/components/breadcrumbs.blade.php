<!-- Breadcrumbs -->
<div class="mb-3 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
    <small class="text-xsmall">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ url("dashboard") }}">
                    <ion-icon name="home"></ion-icon>
                    {{ __("Dashboard") }}
                </a>
            </li>
            @php $segments = ''; @endphp
            @foreach (Request::segments() as $segment)
            @if ($segment == "dashboard")
            @php continue; @endphp
            @endif
            @php $segments .= '/'.$segment; @endphp &nbsp
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ url($segments) }}">{{ ucwords(str_replace("_", " ", $segment)) }}
                </a>
            </li>
            @endforeach

        </ol>
    </small>
    <div>
        <a href="https://wa.link/v9u8s9" class="btn btn-primary btn-sm me-2">
            <ion-icon name="logo-whatsapp" class="align-middle fs-6"></ion-icon> Let's chat
        </a>
        <a href="{{ route('msg_compose') }}" class="btn btn-warning btn-sm">
            <ion-icon name="chatbubbles-outline" class="align-middle fs-6"></ion-icon> Message BK
        </a>
    </div>
</div>
