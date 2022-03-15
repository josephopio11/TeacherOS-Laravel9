@if (Session::has('message'))
    <div class="alert alert-success">
        <div class="alert-title">
            {{ __('Success') }}
        </div>
        <div class="text-muted">
            {{ Session::get('message') }}
        </div>
    </div>
@endif

@if (count($errors) > 0)


    <div class="alert alert-danger">
        <div class="alert-title">
            {{ __('Errors') }}
        </div>
        <div class="text-muted">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endif
