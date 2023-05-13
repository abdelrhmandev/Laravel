<div class="mb-10 fl w-100">
    <!--begin::Label-->
    <label class="required form-label">ss [{{ $lang }}] </label>
    <!--end::Label-->
    <!--begin::Input-->

    <input type="text"
        id="title_{{ $langshortcode }}" name="title_{{ $langshortcode }}"
        type="text"
        class="input-reset ba b--black-20 pa2 mb2 db w-100"
        required
        data-fv-not-empty___message="title {{ $langshortcode }} is required"
        />

    </div>
