@if(session('success'))
    <input type="checkbox" id="close-alert-success" class="close-alert-checkbox">
    <div class="alert alert-success">
        <label for="close-alert-success" class="alert-content">
            {{ session('success') }}
        </label>
    </div>
@endif

@if(session('error'))
    <input type="checkbox" id="close-alert-error" class="close-alert-checkbox">
    <div class="alert alert-error">
        <label for="close-alert-error" class="alert-content">
            {{ session('error') }}
        </label>
    </div>
@endif

@if ($errors->any())
    <input type="checkbox" id="close-alert-errors" class="close-alert-checkbox">
    <div class="alert alert-danger">
        <label for="close-alert-errors" class="alert-content">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </label>
    </div>
@endif
