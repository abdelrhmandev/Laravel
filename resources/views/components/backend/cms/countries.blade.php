 <div class="fv-row fl">
    <label class="required form-label" for="country_id">{{ __('site.country') }}</label>             
                <select name="country_id" id="country_id" class="form-select form-select-solid" data-hide-search="false" data-control="select2" data-close-on-select="true" data-placeholder="{{ __('site.select')}} {{ __('site.country')}}" data-allow-clear="true" required data-fv-not-empty___message="
                {{ __('validation.required', ['attribute' => 'country']) }}">
                <option></option>
                @foreach($countries as $country)          
                <option value="{{ $country->id }}" {{ isset($id) && $id == $country->id ? 'selected':'' }}>
                    {{  $country->{'title_'.app()->getLocale()} }}
                </option>
                @endforeach  
            </select>
        </div>
 
