@if (Session::has('success'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-dismissible bg-success me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
            <span class="svg-icon svg-icon-1 svg-icon-success text-white">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                    <path
                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <div class="me-3">&nbsp;{{ Session::get('success') }}</div>
        </div>
    </div>
@elseif(Session::has('error'))
<div class="container-xxl" id="kt_content_container">
    <div class="alert alert-dismissible bg-danger me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
        <span class="svg-icon svg-icon-1 svg-icon-success text-white">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"></rect>
                <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"></rect>
            </svg>
        </span>
        <div class="me-3">&nbsp;{{ Session::get('error') }}</div>
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
