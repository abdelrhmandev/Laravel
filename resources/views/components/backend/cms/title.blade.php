<div class="mb-10 fl w-100">
<!--begin::Label-->
<label class="required form-label">Title [{{ $lang }}] </label>
<!--end::Label-->
<!--begin::Input-->

<input data-fv-not-empty="true" data-fv-not-empty___message="The Csutom is required" type="text" name="title_{{ $langshortcode }}" class="form-control mb-2 @error('title_'.$langshortcode) is-invalid @enderror" value="{{ old('title_'.$langshortcode)  }}" placeholder="Add Title [{{ $lang }}]" />
@error('title_'.$langshortcode)
<div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
@enderror
</div>