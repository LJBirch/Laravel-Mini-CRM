@if(session()->has('message'))
<div class="toast-container position-absolute p-3 end-0 bottom-0">
    <div class="toast align-items-center show bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{session('message')}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"></button>
        </div>
    </div>
</div>
@endif
