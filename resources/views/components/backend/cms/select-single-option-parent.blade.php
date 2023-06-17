<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{ __('category.parent') }}</h2>
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
        <select name="parent_id" class="form-select mb-2" data-control="select2" data-allow-clear="true">
                <option value="0">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        
                        @if($category->id == $category->parent_id) "selected" @else "" @endif
                        >
                        {{ $category->translate->title }}  {{ $category->parent_id ?? 'NO' }}
                        @if ($category->children->isNotEmpty())
                            <x-backend.cms.select-single-option-childs  :childs="$category->children" : level="{{ $level + 1 }}" :parentid="$category->id ?? ''" :ss="/>
                        @endif
                    </option>
                @endforeach
            </select>
    </div>
    <!--end::Card body-->
</div>