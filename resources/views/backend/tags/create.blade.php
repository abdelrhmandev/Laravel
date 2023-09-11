<form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
    data-form-submit-error-message="{{ __('site.form_submit_error') }}" data-form-agree-label="{{ __('site.agree') }}"
    enctype="multipart/form-data">
    <div class="d-flex flex-column gap-6 gap-lg-10 w-30 p-1 mb-7 me-lg-5">
        <x-backend.langs.ulTabs />
        <x-backend.langs.LangInputs :showDescription="0" :richTextArea="0" :showSlug="1" />
        <x-backend.btns.button />
    </div>
    <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-500px gap-lg-10">
        @include('backend.tags.listing')
    </div>
</form>
