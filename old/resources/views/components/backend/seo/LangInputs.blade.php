<p class="bg-info text-inverse-info p-3 fw-semibold fw-6">
    SEO Meta Options ( <i>Optional</i> )
</p>
<div class="mb-8 fv-row">
    <label class="form-label" for="meta_tag_title{{ substr($properties['regional'], 0, 2) }}">
        Meta Tag Title </label>
    <input type="text" id="meta_tag_title_{{ substr($properties['regional'], 0, 2) }}"
        name="meta_tag_title_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2" />

    <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise
        keywords.</div>
</div>


<div class="mb-5 fv-row">
    <!--begin::Label-->
    <label class="form-label" for="meta_tag_description{{ substr($properties['regional'], 0, 2) }}"> Meta Tag
        Description </label>
    <div id="meta_tag_description_div_{{ substr($properties['regional'], 0, 2) }}" class="min-h-100px mb-2"></div>
    <textarea class="d-none" rows="4" cols="30" type="text"
        id="meta_tag_description{{ substr($properties['regional'], 0, 2) }}"
        name="meta_tag_description{{ substr($properties['regional'], 0, 2) }}" /></textarea>
    <div class="text-muted fs-7">Meta tag description should be between 50-155 characters.</div>
</div>


 
