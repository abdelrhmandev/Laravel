<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
         <label class="required form-label"
                for="country_id">{{ __('country.singular') }}</label>                
        </div>
    </div>
    <div class="card-body pt-0">
    
    
    
 


    
        <div class="fv-row fl">            
                <select name="country_id" id="country_id" class="form-select form-select-solid" data-hide-search="false" data-control="select2" data-close-on-select="true" data-placeholder="{{ __('country.select')}}" data-allow-clear="true" required data-fv-not-empty___message="
                {{ __('validation.required', ['attribute' => 'country_id']) }}">
                <option></option>
                @foreach($countries as $country)          
                <option value="{{ $country->id }}" {{ isset($id) && $id == $country->id ? 'selected':'' }}>
                    {{  $country->{'title_'.app()->getLocale()} }}
                </option>
                @endforeach  
            </select>
        </div>
    </div>
</div>
