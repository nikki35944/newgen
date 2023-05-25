@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show mt-20" role="alert">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error_message'))
    <div class="alert alert-danger alert-dismissible fade show mt-20" role="alert">
        <strong>{{ session('error_message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
