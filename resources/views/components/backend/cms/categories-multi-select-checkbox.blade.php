<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('category.plural')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">                  
            @if(!(empty($categories)))
                @foreach ($categories as $category)
                <div class="form-check form-check-custom form-check-solid mb-2">
                    <input type="checkbox" name="category_id[]" class="form-check-input" value="{{ $category->id }}" 
                    @if(isset($row) && in_array($category->id,$row->categories->pluck('id')->toArray()))
                    {{ "checked" }}
                    @endif>
                    <label class="form-check-label" for="flexCheckDefault">    
                        {{ $category->translate->title }}
                    </label>
                </div>                   
                        @if ($category->children->isNotEmpty())
                            <x-backend.cms.select-single-checkbox-childs 
                            :childs="$category->children" :pluckarr="$row->categories->pluck('id')->toArray()" :parentid="$parentid ?? ''"
                                level="{{ $level + 1 }}" />
                        @endif                
                @endforeach
            @endif
    </div>
</div>