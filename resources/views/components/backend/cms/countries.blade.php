<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('country.plural')}} sadasd</h2>
        </div>
    </div>
    <div class="card-body pt-0">      
            <div class="row row-cols-1 row-cols-md-0 row-cols-lg-1 row-cols-xl-5 g-2" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                @foreach ($countires as $country)               
                <div class="form-check form-check-custom form-check-solid mb-2">
                    <input class="form-check-input" type="checkbox" name="country_id[]" value="{{ $country->id }}" @if(isset($row) && in_array($country->id,$row->countires->pluck('id')->toArray())) checked @endif />                  
                    <label class="form-check-label" for="flexCheckDefault">    
                     qqqqqqqqqq
                    </label>
                </div>
                @endforeach
            </div>       
    </div>
</div>