<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('tag.plural')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">      
            <div class="row row-cols-1 row-cols-md-0 row-cols-lg-1 row-cols-xl-5 g-2" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                @foreach ($tags as $tag)               
                <div class="form-check form-check-custom form-check-solid mb-2">
                    <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $tag->id }}" @if(isset($row) && in_array($tag->id,$row->tags->pluck('id')->toArray())) checked @endif />                  
                    <label class="form-check-label" for="flexCheckDefault">    
                        {{ $tag->translate->title }}
                    </label>
                </div>
                @endforeach
            </div>       
    </div>
</div>