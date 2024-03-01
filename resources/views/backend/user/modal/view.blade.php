<div class="col-md-12">
    <div class="card card-user">
        <div class="image">
            <img src="{{ asset('images/background.jpg') }}" alt="background" />
        </div>
        <div class="content">
            <div class="author">
                <img class="avatar" src="{{ asset('storage/uploads/' . $data->image) }}" alt="profile picture" />
                <h4 class="title">{{ $data->name }}<br />
                    <p class="text-fade">{{ $data->user_type }}</p>
                </h4>
            </div>
            <p class="description lead text-center">
                {{ $data->username }}
            </p>
            <p class="text-center">
                {{ $data->email }}
            </p>
            <p class="lead text-center">
                {{ $data->phone }}
            </p>
            <p class="lead text-center">

                @if ($data->status == 1)
                    <span class="green">{{ 'Active' }}</span>
                @else
                    <span class="red">{{ 'Inactive' }}</span>
                @endif <br>
            </p>
            <p class="text-center">
                {{ date('D, M d, Y', strtotime($data->created_at)) }}
            </p>
        </div>
        <hr>
    </div>
</div>
