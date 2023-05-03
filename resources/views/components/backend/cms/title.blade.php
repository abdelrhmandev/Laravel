<div class="mb-10 fv-row">
<!--begin::Label-->
<label class="required form-label">Title [{{ $lang }}] </label>
<!--end::Label-->
<!--begin::Input-->

<input type="text" name="title_{{ $langshortcode }}" class="form-control mb-2" placeholder="Add Title [{{ $lang }}]" />
@error('title_'.$langshortcode)
<span class="invalid-feedbackXX" role="alert">
<strong>ssssssssssssss</strong>
</span>
@enderror
<!--end::Input-->
<!--begin::Description-->
<!--end::Description-->
</div>