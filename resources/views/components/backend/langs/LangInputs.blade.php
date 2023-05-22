
<div class="tab-content">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active':''}}" id="{{ substr($properties['regional'],0,2) }}" role="tabpanel">
        <div class="d-flex flex-column gap-7 gap-lg-10">
            <div class="card card-flush py-4">
    
                
                <div className='rounded border p-10'>
                    <div className="card card-bordered">
                      <div className="card-header ribbon">
                        <div className="card-title">Ribbon Example</div>
                        <div className="ribbon-label bg-primary">Ribbon</div>
                      </div>
                      <div className="card-body">
                        ...
                      </div>
                    </div>
                  </div>

                  
                <div class="card-body pt-2">
                    <div class="mb-10 fv-row">
                        <label class="required form-label" for="title{{ substr($properties['regional'],0,2) }}">{{ __('site.title') }} [{{ substr($properties['regional'],0,2) }}]</label>
                        <input type="text" id="title{{ substr($properties['regional'],0,2) }}" name="title_{{ substr($properties['regional'],0,2) }}" class="form-control mb-2"/>
                     </div>


                    <div class="mb-10 fv-row">
                        <label class="required form-label" for="description{{ substr($properties['regional'],0,2) }}">{{ __('site.description')}} [{{ substr($properties['regional'],0,2) }}]</label>
                            <textarea type="text" id="description_{{ substr($properties['regional'],0,2) }}" name="description_{{ substr($properties['regional'],0,2) }}" class="editor @error('description_'.substr($properties['regional'],0,2)) is-invalid @enderror"/>{{ old('description_'.substr($properties['regional'],0,2)) }}</textarea>                            
                     </div>


                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
