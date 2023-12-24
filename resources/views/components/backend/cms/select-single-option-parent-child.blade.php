<select class="form-select form-select-solid" data-control="select2" name="category_id" id="category_id" data-placeholder="{{ __('site.sort_by')}} {{ __('category.singular')}} " data-allow-clear="true">
    <option value="">{{ __('site.none') }}</option>
    @if(!(empty($categories)))
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(isset($categoryid) && $categoryid  == $category->id) {{ "selected" }} @endif>
                {{ $category->translate->title }} 


                {{ $category->posts_count }} 
                
                @if ($category->children->isNotEmpty())
                    <x-backend.cms.select-single-option-childs :childs="$category->children" :parentid="$parentid ?? ''" level="{{ $level + 1 }}" :categoryid="$categoryid"/>
                @endif
            </option>
        @endforeach
    @endif
</select>