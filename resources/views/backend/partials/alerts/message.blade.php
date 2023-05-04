@if (Session::has('success'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
            {!! session()->get('success') !!}
        </div>
    </div>
@elseif(Session::has('error'))
    <div class="container-xxl" id="kt_content_container">


        

<div class="alert alert-danger alert-light-primary fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">A simple primary alert—check it out!</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>









    </div>
@elseif(Session::has('warning'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-warning" role="alert">
            {{ Session::get('warning') }}
        </div>
    </div>
@elseif(Session::has('info'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-info" role="alert">
            {{ Session::get('info') }}
        </div>
    </div>
@endif
