 @foreach ($childs as $child)
    <div class="form-check form-check-custom form-check-solid mb-2" style="margin-{{ (app()->getLocale() === 'en' ? 'left' :'right') }} : {!!  $level+25  !!}px;">
    <input type="checkbox" class="form-check-input" value="{{ $child->id }}" 
        name="category_id[]"
         
        @if(!empty($pluckarr) && $child->id) 
            @if(in_array($child->id,$pluckarr))
                {{ "checked"}}
            @endif
        @endif
        >  
        <label class="form-check-label" for="flexCheckDefault"> 
            {{ $child->translate->title ?? '' }}
        </label>        
    </div>
    @if (count($child->children))        
        <x-backend.cms.select-single-checkbox-childs :childs="$child->children" :pluckarr="$pluckarr" :level="$level + 25" :parentid="$parentid" />
    @endif    
@endforeach
