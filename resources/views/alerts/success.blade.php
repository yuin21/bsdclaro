@if (session('success'))
    <div class="alert alert-success mb-2" role="alert">
        {{ session('success') }}
        <button type="button" class="close" style="color:white; opacity: initial" data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
