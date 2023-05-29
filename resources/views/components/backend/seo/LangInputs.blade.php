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
    <div class="text-muted fs-7">Set a meta tag description to the category for increased SEO
        ranking.</div>
</div>


<div class="mb-5 fv-row">
    <!--begin::Label-->
    <label class="form-label">Meta Tag Keywords</label>
    <!--end::Label-->
    <!--begin::Editor-->
    <input id="kt_ecommerce_add_category_meta_keywords" name="kt_ecommerce_add_category_meta_keywords"
        class="form-control mb-2" />
    <!--end::Editor-->
    <!--begin::Description-->
    <div class="text-muted fs-7">Set a list of keywords that the category is related to.
        Separate the keywords by adding a comma
        <code>,</code>between each keyword.
    </div>
    <!--end::Description-->
</div>
