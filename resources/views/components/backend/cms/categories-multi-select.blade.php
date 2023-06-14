<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Categories</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <!--begin::Label-->
        <!--end::Label-->
        <!--begin::Select2-->
        <select class="form-select mb-2" data-control="select2" data-placeholder="{{  __('category.select_multi') }}" data-allow-clear="true" multiple="multiple">
            <option value=""></option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->translate->title }}
                    @if ($category->children->isNotEmpty())
                        <x-backend.cms.select-single-option-childs :childs="$category->children" :
                            level="{{ $level + 1 }}" />
                    @endif
                </option>
            @endforeach

        </select>
        <!--end::Select2-->
        <!--begin::Description-->

        <!--end::Description-->
        <!--end::Input group-->
        <!--begin::Button-->
        <a href="../../demo7/dist/apps/ecommerce/catalog/add-category.html" class="btn btn-light-success btn-sm mb-2 mt-5">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
        <span class="svg-icon svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->{{  __('category.add') }}</a>
        <!--end::Button-->
        <!--begin::Input group-->
        <!--begin::Label-->
        
        <!--end::Label-->
        <!--begin::Input-->
        
        <!--end::Input-->
        <!--begin::Description-->

        <!--end::Description-->
        <!--end::Input group-->
    </div>
    <!--end::Card body-->
</div>