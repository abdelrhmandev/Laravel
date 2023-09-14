<div class="fv-row fv-plugins-icon-container">
    <label class="required form-label">{{ __('category.parent') }}</label>
    <select name="parent_id" class="form-select mb-2" data-control="select2" data-allow-clear="true">
        <option value="">{{ __('site.none') }}</option>
        @if(!(empty($categories)))
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(isset($parentid) && $parentid  == $category->id) {{ "selected" }} @endif>
                    {{ $category->translate->title }}
                    @if ($category->children->isNotEmpty())
                        <x-backend.cms.select-single-option-childs :childs="$category->children" :parentid="$parentid ?? ''"
                            level="{{ $level + 1 }}" />
                    @endif
                </option>
            @endforeach
        @endif
    </select>
</div>



 