<div class="card card-flush">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('category.parent')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
    
        <div class="fv-row fv-plugins-icon-container">

        <select name="parent_id" class="form-select" data-control="select2" data-allow-clear="true">
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



    </div>
</div>